@extends('layouts.app')

@section('content')
<section style="padding-top: 100px;">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7 col-xl-6">

                <div class="common-block">

                    <div class="line-title">
                        <h1>{{ __('Login') }}</h1>
                    </div>

                    <form method="POST" action="{{ route('login') }}?status=1">
                        @csrf
                         <div class="row">
                            <div class="row col-md-12 " style="border-bottom: 1px solid #eee; padding-bottom: 30px; margin:0px 15px 20px 5px;">
                                <div class="col-md-6">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                        </div>
                                        <a href="{{ url('/auth/redirect/google') }}" >
                                            <p class="btn-text">
                                                <b>Sign in with Google</b>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/F_icon_reversed.svg/258px-F_icon_reversed.svg.png"/>
                                        </div>
                                        <a href="{{ url('/auth/redirect/facebook') }}" >
                                            <p class="btn-text">
                                                <b>Sign in with Facebook</b>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @php(session(['buystatus' => 'no']))

                         

                            <div class="col-sm-12 margin-10px-bottom">

                                <div class="form-group">
                                    <label>{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-12 margin-10px-bottom">

                                <div class="form-group">
                                    <label>{{ __('Password') }}</label>
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                        </div>


                        <button type="submit" class="butn theme btn-block margin-20px-top"><span>{{ __('Login') }}</span></button>
                        <div class="text-center text-small margin-20px-top">
                            @if (Route::has('password.request'))
                                <a class="m-link-muted" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="text-center text-small margin-20px-top">
                            <span>Don't have an account yet? <a href="{{ route('register') }}">{{ __('Register FREE') }}</a></span>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection
