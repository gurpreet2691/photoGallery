<div class="col s6 m6 l3">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator card-height" src="/images/{{ $gallery->cover_image }}">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">{{ $gallery->name }}</span>
            @if (Auth::check())
                <p><a href="/gallery/show/{{ $gallery->id }}">Upload More Images</a></p>
            @endif
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ $gallery->name }}<i class="material-icons right">close</i></span>
            <p>
                {{ $gallery->description }}
            </p>
    </div>
  </div>
</div>