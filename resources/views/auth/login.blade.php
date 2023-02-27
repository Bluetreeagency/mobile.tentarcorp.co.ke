@extends('layouts.app')
@section('header')
   <!-- App Header -->
   <div class="appHeader no-border transparent position-absolute">
      <div class="left">
         <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
         </a>
      </div>
      <div class="pageTitle"></div>
      <div class="right">
         <a href="{!! route('register') !!}" class="headerButton">
            Register
         </a>
      </div>
   </div>
   <!-- * App Header -->
@endsection
@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <center><img src="{!! asset('assets/img/lg-logo.png') !!}" alt="" style="width:40%"></center>
            <h2 class="text-center mt-2">Log in</h2>
            @include('partials._messages')
            <div class="card">
               <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="form-group basic">
                        <div class="input-wrapper">
                           <label class="label" for="email1">{{ __('Your ID Number') }}</label>
                           <input type="number" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required autofocus>
                           @error('id_number')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="form-group basic">
                        <div class="input-wrapper">
                           <label class="label" for="password1">{{ __('Your Password / Pin') }}</label>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     {{-- <div class="row mb-1">
                        <div class="col-md-6 offset-md-4">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                 {{ __('Remember Me') }}
                              </label>
                           </div>
                        </div>
                     </div> --}}

                     <div class="row mb-0">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-block mt-3">
                                 {{ __('Login') }}
                           </button>

                           @if (Route::has('password.request'))
                              <a class="btn btn-link btn-block mt-3 mb-3" href="{{ route('password.request') }}">
                                 <center>{{ __('Forgot Your Password?') }}</center>
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
