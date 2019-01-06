@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel red lighten-3 white-text">
                <h4> Photo Gallery </h4>
                <p>Create a gallery and start Uploading</p>
            </div>
        </div>
    </div>

    @if($galleries->isEmpty()) 
        Your gallery looks empty.
        Start creating a new Gallery by clicking <a href="/gallery/create">here </a>
    @endif

    @foreach ($galleries->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $gallery)
                @include('common.galleryCard', $gallery)
            @endforeach
        </div>
    @endforeach
@endsection