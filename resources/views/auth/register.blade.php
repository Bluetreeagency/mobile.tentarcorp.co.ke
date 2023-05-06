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
      <center><img src="{!! asset('assets/img/lg-logo.png') !!}" alt="" style="width:40%"></center>
      <h2 class="mt-2">Register now</h2>
   </div>
   <div class="section mb-3 p-2">
      @include('partials._messages')
      <form action="{{ route('save.signup') }}" method="post">
         @csrf
         <div class="card">
            <div class="card-body">
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary" for="">Your First Name</label>
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
                     <label class="label text-primary" for="">Your Middle Name</label>
                     <input type="text" name="middle_name" class="form-control" placeholder="Enter Your Middle Name">
                  </div>
                  @error('first_name')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary" for="">Your Last Name</label>
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
                     <label class="label text-primary" for="">ID Number</label>
                     <input type="number" name="id_number" class="form-control" placeholder="Enter your ID Number"  autocomplete="off" required>
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary" for="">Membership Type</label>
                     <select name="membership_type" class="form-control" required>
                        <option value="">Choose Membership </option>
                        <option value="Civil Servant">Civil Servant</option>
                        <option value="Military">Military</option>
                        <option value="Civilian">Civilian</option>
                     </select>
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary" for="">Your Phone Number</label>
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
                     <label class="label text-primary" for="password1">Password</label>
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
                     <label class="label text-primary" for="password2">{{ __('Confirm Password') }}</label>
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
         <button type="submit" class="btn btn-primary btn-block mt-3">Register</button>
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
               <ol>
                  <li><b>Loan eligibility:</b> Tentacorp reserves the right to approve or reject any loan application based on its internal criteria. The applicant must meet all the eligibility criteria set by Tentacorp.</li>
                  <li><b>Loan amount:</b> The loan amount will be determined by Tentacorp and is subject to change at any time.</li>

                  <li><b>Interest rates:</b> The interest rates for the loan will be determined by Tentacorp and will be communicated to the applicant at the time of application. Interest rates may be subject to change at any time.</li>

                  <li><b>Repayment terms:</b> The repayment terms of the loan will be determined by Tentacorp and will be communicated to the applicant at the time of application. The applicant must adhere to the repayment terms and make payments on time.</li>

                  <li><b>Late payment fees:</b> Tentacorp reserves the right to charge late payment fees in the event of a late payment. The late payment fee will be communicated to the applicant at the time of application.</li>

                  <li><b>Prepayment penalties:</b> Tentacorp reserves the right to charge prepayment penalties in the event of an early repayment of the loan. The prepayment penalty will be communicated to the applicant at the time of application.</li>

                  <li><b>Collateral:</b> Tentacorp may require the applicant to provide collateral as a security for the loan. The type of collateral required will be determined by Tentacorp and will be communicated to the applicant at the time of application.</li>

                  <li><b>Loan approval:</b> Tentacorp will notify the applicant of the loan approval status within a reasonable amount of time after receiving the loan application. Tentacorp reserves the right to reject any loan application without providing a reason.</li>

                  <li><b>Governing law:</b> The loan application and all related transactions will be governed by the laws of the jurisdiction in which Tentacorp operates.</li>

                  <li><b>Dispute resolution:</b> Any disputes arising from the loan application or related transactions will be resolved through arbitration in accordance with the rules of the jurisdiction in which Tentacorp operates.</li>

                  <li><b>Changes to terms and conditions:</b> Tentacorp reserves the right to change these terms and conditions at any time without prior notice to the applicant. The most current version of the terms and conditions will be available on Tentacorp's website.</li>
               </ol>

            </div>
         </div>
      </div>
   </div>
   <!-- * Terms Modal -->
@endsection
