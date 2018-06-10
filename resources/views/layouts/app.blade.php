{{-- this is the main wrapping template for all pages --}}
<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name', 'LSAPP')}}</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        @include('inc.navbar')
        
    <!-- this pulls in the content from the relevant page -->
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        {{-- Init the ckeditor wysiwyg --}}
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>CKEDITOR.replace( 'article-ckeditor' );</script>
    </body>
</html>