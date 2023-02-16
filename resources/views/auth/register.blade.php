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
         <a href="{!! route('login') !!}" class="headerButton">
         Login
         </a>
      </div>
   </div>
   <!-- * App Header -->
@endsection
@section('content')
   <div class="section mt-2 text-center">
      <h1>Register now</h1>
      <h4>Create an account</h4>
   </div>
   <div class="section mb-5 p-2">
      @include('partials._messages')
      <form action="{{ route('save.signup') }}" method="post">
         @csrf
         <div class="card">
            <div class="card-body">
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="">Your First Name</label>
                     <input type="text" name="first_name" class="form-control" placeholder="Enter Your First Name" required>
                  </div>
                  @error('first_name')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="">Your Last Name</label>
                     <input type="text" name="last_name" class="form-control" placeholder="Enter your Last name"  autocomplete="off" required>
                  </div>
                  @error('last_name')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="">ID Number</label>
                     <input type="number" name="id_number" class="form-control" placeholder="Enter your ID Number"  autocomplete="off" required>
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="">Membership Type</label>
                     <select name="membership_type" class="form-control" required>
                        <option value="">Choose Membership </option>
                        <option value="Civil Servant">Civil Servant</option>
                        <option value="Military">Military</option>
                        <option value="Civilian">Civilian</option>
                     </select>
                     phone_number
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="">Your Phone Number</label>
                     <input type="number" name="phone_number" class="form-control" placeholder="Enter your phone number" autocomplete="off" required>
                  </div>
                  @error('phone_number')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="password1">Password</label>
                     <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Your password" autocomplete="off" required>
                  </div>
                  @error('password')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label" for="password2">{{ __('Confirm Password') }}</label>
                     <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="off" placeholder="Type password again" required>
                  </div>
               </div>
               <div class="custom-control custom-checkbox mt-2 mb-1">
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" id="customCheckb1" required>
                     <label class="form-check-label" for="customCheckb1">
                        I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
         </div>
      </form>
   </div>
   <!-- Terms Modal -->
   <div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Terms and Conditions</h5>
                  <a href="#" data-bs-dismiss="modal">Close</a>
            </div>
            <div class="modal-body">
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum, urna eget finibus
                     fermentum, velit metus maximus erat, nec sodales elit justo vitae sapien. Sed fermentum
                     varius erat, et dictum lorem. Cras pulvinar vestibulum purus sed hendrerit. Praesent et
                     auctor dolor. Ut sed ultrices justo. Fusce tortor erat, scelerisque sit amet diam rhoncus,
                     cursus dictum lorem. Ut vitae arcu egestas, congue nulla at, gravida purus.
                  </p>
                  <p>
                     Donec in justo urna. Fusce pretium quam sed viverra blandit. Vivamus a facilisis lectus.
                     Nunc non aliquet nulla. Aenean arcu metus, dictum tincidunt lacinia quis, efficitur vitae
                     dui. Integer id nisi sit amet leo rutrum placerat in ac tortor. Duis sed fermentum mi, ut
                     vulputate ligula.
                  </p>
                  <p>
                     Vivamus eget sodales elit, cursus scelerisque leo. Suspendisse lorem leo, sollicitudin
                     egestas interdum sit amet, sollicitudin tristique ex. Class aptent taciti sociosqu ad litora
                     torquent per conubia nostra, per inceptos himenaeos. Phasellus id ultricies eros. Praesent
                     vulputate interdum dapibus. Duis varius faucibus metus, eget sagittis purus consectetur in.
                     Praesent fringilla tristique sapien, et maximus tellus dapibus a. Quisque nec magna dapibus
                     sapien iaculis consectetur. Fusce in vehicula arcu. Aliquam erat volutpat. Class aptent
                     taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                  </p>
            </div>
         </div>
      </div>
   </div>
   <!-- * Terms Modal -->
@endsection
