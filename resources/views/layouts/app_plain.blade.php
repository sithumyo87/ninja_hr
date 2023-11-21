<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    

    @yield('extra_css')
</head>

<body>
    <div id="app">
            @yield('content')
    </div>
    @yield('extra_script')
</body>

</html>

 // $(".sidebar-dropdown > a").click(function(){
    //     $(".sidebar-submenu").slideUp(200);
    //     if( 
    //         $(this).parent().hasClass("active")
    //     ){
    //         $(".sidebar-dropdown").removeClass("active");
    //         $(this).parent().removeClass("active");
    //     }else{
    //         $(".sidebar-dropdown").removeClass("active");
    //         $(this).next(".sidebar-submenu").slideDown(200);
    //     }
    // });

    // $("#close-sidebar").click(function(e){
    //     e.preventDefault();
    //     $(".page-wrapper").removeClass("toggled");
    // });

    // $("#show-sidebar").click(function(e){
    //     e.preventDefault();
    //     $(".page-wrapper").addClass("toggled");
    // })

    // document.addEventListener('click',function(event)){
    //     if(document.getElementById('show-sidebar').contains(event.target)){
    //         $('.page-wrapper').addClass("toggled");
    //     }else if(!document.getElementById('sidebar').contains(event.target)){
    //         $(".page-wrapper").removeClass("toggled");
    //     }
    // }