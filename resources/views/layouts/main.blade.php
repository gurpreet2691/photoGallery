<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/css/custom.css"  media="screen,projection"/> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/materialize.min.js"></script>
    </head>
    <body>
        <div class="container" style="width: 100%">
            <div class="row">
                <div class="col s3">
                    @include('common.nav')
                </div>
                <div class="col s9">
                    @yield('content')
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('.materialboxed').materialbox();
                $('.sidenav').sidenav();
            });
      
        </script>
    </body>
</html>