<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','Laravel')}} | {{  explode('/', strtoupper(Route::current()->uri()))[0]}}</title>
        <link rel="icon" href="{{asset('images/Logo/indice.png')}}">

        <!-- Styles -->
        {{Html::style('css/bootstrap.min.css')}}
        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: auto;
            }

            .form-signin .checkbox {
                font-weight: 400;
            }

            .form-signin .form-control {
                position: relative;
                box-sizing: border-box;
                height: auto;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body class="text-center">

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <a href="{{url('/')}}"><img class="mb-4" src="{{asset('images/LdsWebDes.png')}}" alt="Lds WebDes Logo" width="150" height="150"></a>

            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="sr-only">E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="sr-only">Password</label>

                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>

            <p class="mt-5 mb-3 text-muted">&copy; Cal-WebDes 2018</p>

        </form>
    </body>
</html>
