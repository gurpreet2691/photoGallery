<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Exception;
use Validator;
use App\Photos;
use App\Galleries;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Show all gallery object related to the owner
     * 
     * @return View
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $galleries = Galleries::where('owner_id', Auth::id())->get();
        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show form to create a new gallery 
     * 
     * @return View
     */
    public function create() 
    {
        if (!Auth::check()) {
            return redirect()->route('gallery.index');
        }

        return view('gallery.create');
    }

    /**
     * Insert a new row into the gallery table
     * 
     * @param Request $request
     * @return View
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|regex:/^[a-zA-Z0-9_\-]*$/|max:255',
            'description'   => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            'cover_image'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name         = $request->get('name');
        $description  = $request->get('description');
        $coverImage   = $request->file('cover_image');

        $coverImageFilename = 'noImage.jpg';

        if ($coverImage) {
            $coverImageFilename = $coverImage->getClientOriginalName();
            $coverImage->move(public_path('images'), $coverImageFilename);
        }

        try {
            $gallery = new Galleries();
            
            $gallery->name          = $name;
            $gallery->description   = $description;
            $gallery->cover_image   = $coverImageFilename;
            $gallery->owner_id      = Auth::id();
           
            $gallery->save();
        } catch (\Exception $e) {
            dd('Error'. $e->getMessage());
        }

       return redirect()->route('gallery.create')->with('message', 'Gallery Created');
    }

    /**
     * Show all gallery photos.
     * 
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $gallery = Galleries::find($id);
        $photos = Photos::where('gallery_id', $id)->get();
        return view('gallery.show', compact('gallery', 'photos'));
    }
}
