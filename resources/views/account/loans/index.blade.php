@extends('layouts.app')
@section('title','My Loan Requests')
@section('header')
   @include('partials._header')
@endsection
@section('content')
<!-- Transactions -->
<div class="section mt-3">
   <div class="transactions mb-3">
      <!-- item -->
      @foreach($loans as $loan)
         <a href="#" class="item" style="@if($loan->due_date < date('Y-m-d') && $loan->balance > 0 && $loan->loan_status == 'Approved') background-color: #ffd0d0; @endif">
            <div class="detail">
               <i class="fal fa-exclamation-circle image-block imaged w48 fa-3x"></i>
               <div>
                  ksh {!! number_format($loan->repayment_amount) !!}
                  <strong class="font-small">Applied: {!! date('F jS, Y', strtotime($loan->application_date)) !!}</strong>
                  @if($loan->due_date)<strong class="font-small">Due: {!! date('F jS, Y', strtotime($loan->due_date)) !!}</strong>@endif
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
                  @if($loan->balance == 0)
                     <span class="badge badge-warning">Paid</span>
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
