<ul id="slide-out" class="sidenav sidenav-fixed">
    @if(!Auth::check())
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>
    @else
        <h4>Welcome  {{Auth::user()->name}}</h4>
        <li><a href="/">Home</a></li>
        <li><a href="/gallery/create/">Create Gallery</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    @endif
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger">
    <i class="material-icons">menu</i>
</a>
        