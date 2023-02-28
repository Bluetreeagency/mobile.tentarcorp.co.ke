@extends('layouts.app')
@section('title','My Loan Requests')
@section('header')
   @include('partials._header')
@endsection
@section('content')
<!-- Transactions -->
<div class="section mt-5">
   <div class="transactions">

      <!-- item -->
      @foreach ($loans as $loan)
         <a href="#" class="item">
            <div class="detail">
               <i class="fal fa-exclamation-circle image-block imaged w48 fa-3x"></i>
               <div>
                  ksh {!! number_format($loan->repayment_amount) !!}
                  <strong>{!! date('F jS, Y', strtotime($loan->application_date)) !!}</strong>
                  <b class="text-warning">{!! $loan->type !!}</b> <br>
                  @if($loan->loan_status == 'Pending')
                     <span class="badge badge-warning">{{ $loan->loan_status }}</span>
                  @elseif ($loan->loan_status == 'Approved')
                     <span class="badge badge-success">{{ $loan->loan_status }}</span>
                  @elseif($loan->loan_status == 'Rejected')
                     <span class="badge badge-danger">{{ $loan->loan_status }}</span>
                  @elseif($loan->loan_status == 'Waiting disbursement')
                     <span class="badge badge-danger">{{ $loan->loan_status }}</span>
                  @else
                     <span class="badge badge-primary">Awaiting Approval</span>
                  @endif
               </div>
            </div>
         </a>
      @endforeach
      <!-- * item -->

   </div>
</div>
<!-- * Transactions -->
@endsection
