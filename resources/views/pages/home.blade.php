@extends('layouts.app')
@section('content')
   <!-- carousel slider -->
   <div class="carousel-slider splide">
      <div class="splide__track">
         <ul class="splide__list">
            <li class="splide__slide p-2">
               <img src="{!! asset('assets/img/sample/photo/vector1.png') !!}" alt="alt" class="imaged w-100 square mb-4">
               <h2 class="mt-5">Jichagulie due date between 1 and 61 days</h2>
               <p>Pay earlier than your selected repayment date and pay less, or pay later if you need more time.</p>
            </li>
            <li class="splide__slide p-2">
               <img src="{!! asset('assets/img/sample/photo/vector2.png') !!}" alt="alt" class="imaged w-100 square mb-4">
               <h2 class="mt-5">Grow your loan limit up to ksh 500,000</h2>
               <p>Borrow, and repay on time and watch your loan limit grow</p>
            </li>
            <li class="splide__slide p-2">
               <img src="{!! asset('assets/img/sample/photo/vector3.png') !!}" alt="alt" class="imaged w-100 square mb-4">
               <h2 class="mb-2">Secure & Trusted</h2>
               <p>Your data is always secure with Tentacorp. Apply with confidence</p>
            </li>
         </ul>
      </div>
   </div>
   <!-- * carousel slider -->

   <div class="carousel-button-footer">
      <div class="row">
         <div class="col-6">
            <a href="{!! route('register') !!}" class="btn btn-outline-secondary btn-lg btn-block">Register</a>
         </div>
         <div class="col-6">
            <a href="{!! route('login') !!}" class="btn btn-primary btn-lg btn-block">Login</a>
         </div>
      </div>
   </div>
@endsection
