<div class="col s6 m6 l3">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <a href="/photo/details/{{ $pic->id }}">
                <img class="activator card-height" src="/images/{{ $pic->image }}">
            </a>
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">{{ $pic->name }}</span>
            <p><a href="/photo/details/{{ $pic->id }}">VIew Photo</a></p>
        </div>
    </div>
</div>