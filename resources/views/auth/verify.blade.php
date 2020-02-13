<<<<<<< HEAD
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])
=======
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'admin', 'title' => __('Material Dashboard')])
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
              <p class="card-title"><strong>{{ __('Verify Your Email Address') }}</strong></p>
            </div>
            <div class="card-body">
              <p class="card-description text-center"></p>
              <p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
<<<<<<< HEAD

                {{ __('Before proceeding, please check your email for a verification link.') }}

                @if (Route::has('verification.resend'))
                    {{ __('If you did not receive the email') }},
=======
                
                {{ __('Before proceeding, please check your email for a verification link.') }}
                
                @if (Route::has('verification.resend'))
                    {{ __('If you did not receive the email') }},  
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                @endif
              </p>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
