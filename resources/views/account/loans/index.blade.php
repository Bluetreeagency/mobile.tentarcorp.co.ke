@extends('layouts.app')
@section('title','My Loan Requests')
@section('header')
   @include('partials._header')
@endsection
@section('content')
<!-- Transactions -->
<div class="section mt-2">
   <div class="transactions">

      <!-- item -->
      @foreach ($loans as $loan)
         <a href="app-transaction-detail.html" class="item">
            <div class="detail">
               <i class="fal fa-exclamation-circle image-block imaged w48 fa-3x"></i>
               <div>
                  <strong>{!! date('F jS, Y', strtotime($loan->application_date)) !!}</strong>
                  <p>{!! $loan->type !!} | <span class="badge badge-primary">Awaiting Approval</span></p>
               </div>
            </div>
            <div class="right">
               <div class="price text-danger"> ksh {!! number_format($loan->amount_applied) !!}</div>
            </div>
         </a>
      @endforeach
      <!-- * item -->

   </div>
</div>
<!-- * Transactions -->
@endsection
