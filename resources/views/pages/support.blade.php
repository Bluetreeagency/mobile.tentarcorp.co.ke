@extends('layouts.app')
@section('title', 'Support')
@section('header')
   @include('partials._header')
@endsection
@section('content')
   <div class="section mt-2">
      <div class="card">
         <div class="card-body">
            <div class="p-1">
               <div class="text-center">
                  <h2 class="text-primary">Get in Touch</h2>
                  <p>Fill the form to contact us</p>
               </div>
               <form>
                  <div class="form-group basic animated">
                     <div class="input-wrapper">
                        <label class="label" for="name2">Your name</label>
                        <input type="text" class="form-control" id="name2" placeholder="Your name">
                        <i class="clear-input">
                              <ion-icon name="close-circle"></ion-icon>
                        </i>
                     </div>
                  </div>

                  <div class="form-group basic animated">
                     <div class="input-wrapper">
                        <label class="label" for="email2">E-mail</label>
                        <input type="text" class="form-control" id="email2" placeholder="E-mail">
                        <i class="clear-input">
                              <ion-icon name="close-circle"></ion-icon>
                        </i>
                     </div>
                  </div>

                  <div class="form-group basic animated">
                     <div class="input-wrapper">
                        <label class="label" for="textarea2">Message</label>
                        <textarea id="textarea2" rows="4" class="form-control"
                              placeholder="Message"></textarea>
                        <i class="clear-input">
                              <ion-icon name="close-circle"></ion-icon>
                        </i>
                     </div>
                  </div>

                  <div class="mt-2">
                     <button type="button" class="btn btn-primary btn-block">Send</button>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>

   <div class="section mt-2">
      <div class="card">
         <div class="card-body">
            <div class="p-1">
               <div class="text-center">
                  <h2 class="text-primary">Our Contacts</h2>
                  <p class="card-text">
                     <a href="telto:254706167167">254706167167</a><br>
                     <a href="mailto:support@tentacorp.com">support@tentacorp.com</a><br>
                     5th Floor (S9), Eureka Condominiums, off Ngong RD, Behind Prestige Plaza, Nairobi, Kenya
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="section mt-2 mb-2">
      <div class="card">
         <div class="card-body">
            <div class="p-1">
               <div class="text-center">
                  <h2 class="text-primary mb-2">Social Profiles</h2>

                  <a href="#" class="btn btn-facebook btn-icon me-05">
                     <ion-icon name="logo-facebook"></ion-icon>
                  </a>

                  <a href="#" class="btn btn-twitter btn-icon me-05">
                     <ion-icon name="logo-twitter"></ion-icon>
                  </a>

                  <a href="#" class="btn btn-linkedin btn-icon me-05">
                     <ion-icon name="logo-linkedin"></ion-icon>
                  </a>

                  <a href="#" class="btn btn-whatsapp btn-icon me-05">
                     <ion-icon name="logo-whatsapp"></ion-icon>
                  </a>

                  <a href="#" class="btn btn-instagram btn-icon me-05">
                     <ion-icon name="logo-instagram"></ion-icon>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
