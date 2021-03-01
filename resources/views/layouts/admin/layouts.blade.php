<html id="admin">
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body style="background:none !important;">
        @component('components.header')
        @endcomponent
        <div class="container pt-5 pb-5">
            @component('components.flash')
            @endcomponent
            @yield('content')
        </div>

         <script src="{{ mix('js/app.js') }}"></script>
         
        
         
    </body>
</html> 


<!--Admin-->