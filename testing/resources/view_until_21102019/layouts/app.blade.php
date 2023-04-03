<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('/img/favicon.ico')}}" type="image/vnd.microsoft.icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SECAD - Auditor') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Eras Demi ITC';
            font-style: normal;
            font-weight: normal;
            src: url('{{asset('css/fonts/ERASDEMI.woff')}}') format('woff');
        }
    </style>
</head>
<body class="bodyLogin" style="background: #d2f1f7 url({{asset('img/header-top.png')}}) repeat-x 0 0; ">

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #0f1f31; border-color: #0f1f31;">
            <div class="container" style="">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:#cccccc; font-weight: 700; font-size: 16.25px;">
                        Auditor <strong>Plus</strong>
                    </a>
                    </a>
                    </a>
                </div>
                <div style="height:64px; padding-left: 18%; float: left;">

                    <img style="height:64px; padding-right: 15px;" src="{{asset('img/logo_fac.png')}}">
                    <span style="font-family: Eras Demi ITC; font-size: 24px; font-weight:400; color: #fff;"> FUERZA AÉREA COLOMBIANA</span>
                    <img style="height:64px; padding-left: 15px;" src="{{asset('img/logo_secad.png')}}">
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>
        @yield('content')

        @if(session()->has('flash'))
        
            <center>  <div class="alert alert-info" style="width: 50%; text-align: center;"> <b style="color:red;">Acceso Restringido </b> <br> {{session('flash')}}</div> </center>

        @endif()
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
