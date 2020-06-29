<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','Laravel')}} | {{  explode('/', strtoupper(Route::current()->uri()))[0]}}</title>
    <link rel="icon" href="{{asset('images/Logo/indice.png')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{Html::style('css/bootstrap.min.css')}}
    <style>
        html, body {
            {{--background: url("{{asset('atlantis-lite/assets/img/bg-abstract2.png')}}");--}}
            {{--background-size: cover;--}}
            background-color: #f0f0f0;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .link-title > a {
            font-size: 60px;
            font-weight: bold;
            color: #6b6b6b;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links > a {
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        /*********** PRELOADER ***********/
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 99999999999;
            height: 100%;
            width: 100%;
            overflow: hidden !important;
        }

        .loaded {
            width: 60px;
            height: 60px;
            position: absolute;
            left: 50%;
            top: 50%;
            /*background-image: url(../images/preloading.gif);*/
            background-repeat: no-repeat;
            background-position: center;
            -moz-background-size: cover;
            background-size: cover;
            margin: -20px 0 0 -20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a class="btn btn-light" href="{{ url('/home') }}">Home</a>
            @else
                <a class="btn btn-primary " href="{{ url('/login') }}">Login</a>
                <a class="btn btn-light" href="{{ url('/register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="">
            {{--            <img src="{{asset('images/Logo/LogoUCACUE.png')}}" alt="Logo UCACUE" width="70%" height="70%">--}}
        </div>
        <div class="link-title">
            <a href="{{URL::to('/home')}}" class="text-break">{{ config('app.name','Laravel') }}</a>
        </div>
    </div>
</div>

</body>
</html>
