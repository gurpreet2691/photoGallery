<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galleries;
use App\Photos;
use DB;
use Auth;
use Exception;

class GalleryController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $galleries =  Galleries::where('owner_id', Auth::id())->get();
        return view('gallery.index', compact('galleries'));
    }

    public function create() 
    {
        if (!Auth::check()) {
            return redirect()->route('gallery.index');
        }

        return view('gallery.create');
    }

    public function store(Request $request) 
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $coverImage = $request->file('cover_image');
        $ownerId = 1;

        $coverImageFilename = 'noImage.jpg';

        if ($coverImage) {
            $coverImageFilename = $coverImage->getClientOriginalName();
            $coverImage->move(public_path('images'), $coverImageFilename);
        }

        try {
        $gallery = new Galleries();
        $gallery->name = $name;
        $gallery->description = $description;
        $gallery->cover_image = $coverImageFilename;
        $gallery->owner_id = Auth::id();
        $gallery->save();
        } catch (\Exception $e) {
            dd('Error'. $e->getMessage());
        }

       return redirect()->route('gallery.create')->with('message', 'Gallery Created');

    }

    public function show($id)
    {
        $gallery = Galleries::find($id);
        $photos = Photos::where('gallery_id', $id)->get();
        return view('gallery.show', compact('gallery', 'photos'));
    }
}
