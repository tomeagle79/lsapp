{{-- this is the main wrapping template for all pages --}}
<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name', 'LSAPP')}}</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/services">Services</a>
    <!-- this pulls in the content from the relevant page -->
        @yield('content')
    </body>
</html>