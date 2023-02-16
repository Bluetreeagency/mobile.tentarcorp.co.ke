@extends('layouts.app')
@section('title','Loan Request')
@section('header')
   @include('partials._header')
@endsection
@section('content')
   <div class="section mt-2 mb-2">
      <h2 class="title text-center mt-5 mb-3">Loan Application</h2>
      <div class="card">
         <div class="card-body">
            <div class="form-group basic">
               <div class="input-wrapper">
                  <label class="label" for="select4">Loan Type</label>
                  <select class="form-control custom-select" id="select4">
                     <option value="3">Choose loan type</option>
                     <option value="Dharura">Dharura Loan</option>
                     <option value="Miradi">Miradi Loan</option>
                  </select>
               </div>
            </div>
            <div class="form-group basic">
               <div class="input-wrapper">
                  <label class="label">Amount</label>
                  <input type="number" class="form-control" id="phone4" placeholder="Enter amount">
               </div>
            </div>
            <div class="form-group basic">
               <div class="input-wrapper">
                  <label class="label">Payment period in months</label>
                  <input type="number" class="form-control" id="phone4" placeholder="Enter mounth">
               </div>
            </div>
            <div class="form-group basic">
               <div class="input-wrapper">
                  <label class="label">Reason for loan application</label>
                  <textarea name="loan_reason" class="form-control" cols="4" rows="4" placeholder="Type here ...."></textarea>
               </div>
            </div>
         </div>
      </div>

      <div class="goals mt-3">
         <!-- item -->
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Interest Per Month</h4>
               </div>
               <div class="price">ksh 450</div>
            </div>
         </div>
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Repayment Period</h4>
               </div>
               <div class="price">ksh 450</div>
            </div>
         </div>
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Interest Amount P.M</h4>
               </div>
               <div class="price">ksh 450</div>
            </div>
         </div>
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Amount To </h4>
               </div>
               <div class="price">ksh 450</div>
            </div>
         </div>
      </div>

      <button type="submit" class="btn btn-block btn-success mt-3">Submit Application</button>
   </div>
@endsection
