@extends('layouts.main')

@section('content')
<div class="row">
    <br/>
    <nav>
        <div class="nav-wrapper">
            <div class="col s12 red lighten-3">
                <a href="/" class="breadcrumb">Gallery</a>
                <a href="/gallery/show/{{ $photo->gallery_id }}" class="breadcrumb">Photo</a>
                <a href="/photo/details/{{ $photo->id }}" class="breadcrumb">{{ $photo->title }}</a>
            </div>
        </div>
    </nav>
</div>

<div class="row">
    <div class="col s6 m6">
        <img class="materialboxed" width="100%" src="/images/{{ $photo->image }}" />
        <figcaption align="center">Click on Image to Enlarge</figcaption>
    </div>
    <div class="col s6 m6">
        <h3>{{ $photo->title }} </h3>
        <p>
            {{ $photo->description }}
        </p>
    </div>
    
</div>
@endsection 