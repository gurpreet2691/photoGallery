@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel red lighten-3 white-text">
                <h4>Create Gallery</h4>
                <p>Upload a photo to create a gallery</p>
            </div>
        </div>
    </div>

    @if(Session::has('message'))
        <div class="card-panel red lighten-3">
            <span class="white-text">
                {{ Session::get('message') }}
            </span>
        </div>
    @endif   

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('createGallery') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Placeholder" name="name" id="name" type="text" class="validate">
                    <label for="name">Name</label>
                </div>
          </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description"  class="materialize-textarea"></textarea>
                  <label for="Description">Description</label>
                </div>
            </div>

            <div class="row">
                <div class="file-field input-field">
                    <div class="btn red lighten-3">
                        <span>Upload Cover Image</span>
                        <input type="file" name="cover_image">
                    </div>
                    <div class="file-path-wrapper">
                        <input name="cover_image" class="file-path validate" type="text" placeholder="Upload Image">
                    </div>
                </div>  
            </div>  

            <div class="row">
                <button class="btn waves-effect red lighten-3" type="submit" name="action">Submit
                </button>
            </div>
        
        </form>
    </div>
@endsection