{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="16x16" href="{{ asset('public/image/vallery-logo-only.png') }}">

    <title>Login Page</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="{{ asset('public/css2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">

    <!--custom css-->
    <link href="{{ asset('public/css2/css/main.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body class="">
    
    <!--===========login start===========-->

    <div class="container">

        

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <a {{-- href="index-2.html" --}} class="brand text-center">
                <img src="{{ asset('public/css2/img/vallery.png') }}" srcset="{{ asset('public/css2/img/vallery.png 2x') }}" alt=""/>
            </a>
            <h2 class="form-signin-heading">Please sign in</h2>
            <div class="form-group">
                <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                <input placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

            <div class="form-group">
                {{-- <label for="inputPassword" class="sr-only">Password</label> --}}
                {{-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> --}}
            
                <label for="password" class="sr-only">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

            </div>

            <div class="checkbox mb-4 mt-4">
                <div class="form-group form-check float-left">
                    {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> --}}
                    {{-- <label class="form-check-label" for="exampleCheck1">Remember me</label> --}}

                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>

                </div>

               {{--  <a href="forgot-password.html"  class="float-right text-muted">Forgot Password ?</a> --}}
            </div>
            {{-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> --}}

                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

            <div class="mt-4">
                <span>
                    Don't have an account yet ?
                </span>
                <a href="#" class="text-primary">Sign Up</a>
            </div>
        </form>

    </div>
    <!--===========login end===========-->


    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="{{ asset('public/css2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('public/css2/vendor/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/jquery.scrollTo.min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->


</body>
</html>