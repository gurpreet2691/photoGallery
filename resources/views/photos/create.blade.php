@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel red lighten-3 white-text">
                <h4>Upload Photo</h4>
                <p>Upload a photo within gallery</p>
            </div>
        </div>
    </div>

    @if(Session::has('message'))
    <div class="row">
        <div class="container">
            <div class="card-panel red lighten-3">
                <span class="white-text">
                    {{ Session::get('message') }}
                </span>
            </div>
        </div> 
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('createPhoto') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="gallery_id" value="{{ $galleryId }}"/>

            <div class="row">
            <div class="input-field col s12">
              <input placeholder="Placeholder" name="title" id="title" type="text" class="validate">
              <label for="name">Title</label>
            </div>
          </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea name="description" id="description"  class="materialize-textarea"></textarea>
                  <label for="Description">Description</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea name="photo_location" id="photo_location"  class="materialize-textarea"></textarea>
                  <label for="photo_location">Photo Location</label>
                </div>
            </div>

            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Upload Photo</span>
                        <input type="file" name="photo">
                    </div>
                    <div class="file-path-wrapper">
                        <input name="photo" class="file-path validate" type="text" placeholder="Upload Photo">
                    </div>
                </div>  
            </div>  

            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                </button>
            </div>
        
        </form>
    </div>
@endsection