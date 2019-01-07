<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Photos;
use Illuminate\Http\Request;
 
class PhotoController extends Controller
{
     /**
     * Show form to create a new photo in gallery 
     * 
     * @return View
     */
    public function create($galleryId) 
    {
        if (!Auth::check()) {
            return redirect()->route('gallery.index');
        }

        return view('photos.create', compact('galleryId'));
    }

    /**
     * Insert a new row into the photo table
     * 
     * @param Request $request
     * @return View
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|regex:/^[a-zA-Z0-9_\-]*$/|max:255',
            'gallery_id'    => 'required|int',
            'description'   => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            'photo_location'=> 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            'photo'         => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name        = $request->get('title');
        $image       = $request->file('photo');
        $galleryId   = $request->get('gallery_id');
        $description = $request->get('description');
        $location    = $request->get('photo_location');
       
        $imageFilename = 'noImage.jpg';

        if ($image) {
            $imageFilename = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageFilename);
        }

        try {
            $photo = new Photos();

            $photo->title       = $name;
            $photo->gallery_id  = $galleryId;
            $photo->description = $description;
            $photo->location    = $location;
            $photo->image       = $imageFilename;
            $photo->owner_id    = Auth::id();

            $photo->save();
        } catch (\Exception $e) {
            dd('Error'. $e->getMessage());
        }

       return redirect()->route('gallery.show', ['id'=> $galleryId])->with('message', 'Photo Created');
    }

    /**
     * Show the complete detail if the image
     * 
     * @return View
     */
    public function details($id)
    {
        $photo = Photos::find($id);
        return view('photos.details', compact('photo'));
    }
}
