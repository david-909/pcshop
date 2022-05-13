<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>@yield('title')</title>

<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="{{ asset('temp/css/bootstrap.min.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('css/toast.css') }}" />

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{ asset('temp/css/slick.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('temp/css/slick-theme.css') }}" />

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{ asset('temp/css/nouislider.min.css') }}" />

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="{{ asset('temp/css/font-awesome.min.css') }}">

<link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{ asset('temp/css/style.css') }}" />
{{-- <link type="text/css" rel="stylesheet" href="{{asset('temp/css/main.css')}}"/> --}}
<link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}" />
<link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
