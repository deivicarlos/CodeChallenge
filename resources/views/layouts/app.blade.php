<!DOCTYPE html>
<html>
    <head>
        <title>Blue Coding Challenge</title>
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            @yield('content')
        </div>
        <div class="container">
            @yield('footer')
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>