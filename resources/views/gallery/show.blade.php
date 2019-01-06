@extends('layouts.main')

@section('content')
<br/>
<div class="row m-1">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12 red lighten-3">
                <a href="/" class="breadcrumb">Gallery</a>
                <a href="/gallery/show/{{ $gallery->id }}" class="breadcrumb">{{ $gallery->name }}</a>
            </div>
        </div>
    </nav>
</div>

<div class="row">
    <h3>{{ $gallery->name }} </h3>
    <p>
        {{ $gallery->description }}
    </p>
    <a href="/photo/create/{{ $gallery->id }}" class="waves-effect red lighten-3 btn">Upload Images</a>
</div>

<div class="row">
    @foreach ($photos->chunk(4) as $photo)
        <div class="row">
            @foreach ($photo as $pic)
                @include('common.photoCard', $pic)
            @endforeach
        </div>
    @endforeach
</div>
@endsection 