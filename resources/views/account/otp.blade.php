@extends('layouts.app')
@section('stylesheet')
   <style>
      .appBottomMenu {
         display: none;
      }
   </style>
@endsection
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
         <a href="#" class="headerButton">
            <i class="fal fa-headset fa-2x"></i>
         </a>
      </div>
   </div>
   <!-- * App Header -->
@endsection
@section('content')
   <div class="section mt-2 text-center">
      <h1>Enter OTP Code</h1>
      <h4>Enter 4 digit OTP verification code</h4>
      <a href="{!! route('otp.resend') !!}">Resend Code</a>
   </div>
   <div class="section mb-5 p-2">
      @include('partials._messages')
      <form action="{!! route('otp.verification') !!}" method="POST">
         @csrf
         <div class="form-group basic">
            <input type="text" class="form-control verification-input" id="smscode" name="otp" placeholder="••••" maxlength="4" required>
         </div>
         <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Verify</button>
         </div>
      </form>
   </div>
@endsection
