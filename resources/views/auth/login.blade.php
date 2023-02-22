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
            <h1 class="text-center mt-5">Log in</h1>
            @include('partials._messages')
            <div class="card">
               <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="row mb-1">
                        <label for="" class="col-md-4 col-form-label text-md-end">{{ __('ID Number') }}</label>

                        <div class="col-md-6">
                           <input type="number" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required autofocus>

                           @error('id_number')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-1">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                           @error('password')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-1">
                        <div class="col-md-6 offset-md-4">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                 {{ __('Remember Me') }}
                              </label>
                           </div>
                        </div>
                     </div>

                     <div class="row mb-0">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-block">
                                 {{ __('Login') }}
                           </button>

                           @if (Route::has('password.request'))
                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                 </a>
                           @endif
                        </div>
                        <div class="col-md-12 border-top">
                           <h2 class="text-center mt-3"><a href="{!! route('register') !!}" class="">Sign up</a></h2>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
