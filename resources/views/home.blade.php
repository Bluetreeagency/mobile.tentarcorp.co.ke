@extends('layouts.app')
@section('content')
<!-- carousel slider -->
<div class="carousel-slider splide">
   <div class="splide__track">
       <ul class="splide__list">
           <li class="splide__slide p-2">
               <img src="assets/img/sample/photo/vector1.png" alt="alt" class="imaged w-100 square mb-4">
               <h2>Simple to Use</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           </li>
           <li class="splide__slide p-2">
               <img src="assets/img/sample/photo/vector2.png" alt="alt" class="imaged w-100 square mb-4">
               <h2>Minimalist and Stylish</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           </li>
           <li class="splide__slide p-2">
               <img src="assets/img/sample/photo/vector3.png" alt="alt" class="imaged w-100 square mb-4">
               <h2>Easy to Use Components</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           </li>
       </ul>
   </div>
</div>
<!-- * carousel slider -->

<div class="carousel-button-footer">
   <div class="row">
       <div class="col-6">
           <a href="app-components.html" class="btn btn-outline-secondary btn-lg btn-block">Register</a>
       </div>
       <div class="col-6">
           <a href="app-components.html" class="btn btn-primary btn-lg btn-block">Login</a>
       </div>
   </div>
</div>
@endsection
