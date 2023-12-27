@extends('layouts.app')

@section('content')
<!-- start page title section -->
<section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="assets/img/bg/bg9.jpg">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                
                <h1>{{ __('You are logged in!') }}</h1>
            </div>
            
        </div>

    </div>
</section>
@endsection
