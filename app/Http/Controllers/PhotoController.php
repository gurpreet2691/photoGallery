<?php

namespace App\Http\Controllers;

use Auth;
use App\Photos;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create($galleryId) 
    {
        if(!Auth::check()) {
            return redirect()->route('gallery.index');
        }

        return view('photos.create', compact('galleryId'));
    }

    public function store(Request $request) 
    {
        $name = $request->get('title');
        $galleryId = $request->get('gallery_id');
        $description = $request->get('description');
        $location = $request->get('photo_location');
        $image = $request->file('photo');

        $imageFilename = 'noImage.jpg';

        if ($image) {
            $imageFilename = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageFilename);
        }

        try {
        $photo = new Photos();
        $photo->title = $name;
        $photo->gallery_id = $galleryId;
        $photo->description = $description;
        $photo->location = $location;
        $photo->image = $imageFilename;
        $photo->owner_id = Auth::id();
        $photo->save();
        } catch (\Exception $e) {
            dd('Error'. $e->getMessage());
        }

       return redirect()->route('gallery.show', ['id'=> $galleryId])->with('message', 'Photo Created');

    }

    public function details($id)
    {
        $photo = Photos::find($id);

        return view('photos.details', compact('photo'));
    }

}
