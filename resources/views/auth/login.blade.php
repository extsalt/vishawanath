@extends('layouts.app')

@section('content')
<section style="padding-top: 100px;">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-8 col-xl-7">

                <div class="common-block">

                    <div class="line-title">
                        <h1>{{ __('Login') }}</h1>
                    </div>

                    <form method="POST" action="{{ route('login') }}" id="logform">
                        @csrf
						
                         <div class="row">
						 @if($_GET['status']==1)
							<input type="hidden" name="fkey" value="1" id="hid"> 
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
							@else
								<input type="hidden" name="fkey" value="2" id="hid"> 
							@endif
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


                        <button type="submit" id="login" class="butn theme btn-block margin-20px-top"><span>{{ __('Login') }}</span></button>
                        <div class="text-center text-small margin-20px-top">
                            @if (Route::has('password.request'))
                                <a class="m-link-muted" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
						
                        <div class="text-center text-small margin-20px-top">
							@if($_GET['status']==1)
								<span>Don't have an account yet? <a href="/register?status=1" style='color: blue;'>{{ __('Register FREE') }}</a></span>
							@else
								<span>Don't have an account yet? <a href="/register?status=2" style='color: blue;'>{{ __('Register FREE') }}</a></span>
							@endif
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(function() { 
    $(document).on("click", "#login", function (e) {
		var hid = $('#hid').val();
		$.ajax({
			url: '{{url("makesession")}}',
			type: 'get',
			data: {
			'hid': hid,
			'_token': '{{csrf_token()}}',
			},
			success: function(data) {
			}
		});
	});
});
</script>
@endsection
