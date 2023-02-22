@extends('layouts.app')
@section('header')
   @include('partials._header2')
@endsection
@section('stylesheet')
   <style>
      .stat-box {
         min-height: 100px;
      }
   </style>
@endsection
@section('content')
   <!-- Wallet Card -->
   <div class="section wallet-card-section pt-1">
      <div class="wallet-card">
         <!-- Balance -->
         <div class="balance">
            <div class="left">
               <span class="title">Total Balance</span>
               <h2 class="total">ksh {!! number_format($balance) !!}</h2>
            </div>
            <div class="right">
               <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                  <i class="far fa-eye"></i>
               </a>
            </div>
         </div>
         <!-- * Balance -->
         <!-- Wallet Footer -->
         <div class="wallet-footer">
            <div class="item">
               <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                  <div class="icon-wrapper bg-danger">
                     <i class="fal fa-usd-circle"></i>
                  </div>
                  <strong>Repay Loan</strong>
               </a>
            </div>
            <div class="item">
               <a href="{!! route('loan.request') !!}" data-bs-toggle="modal" data-bs-target="#sendActionSheet">
                  <div class="icon-wrapper">
                     <i class="fal fa-hand-holding-usd"></i>
                  </div>
                  <strong>Request Loan</strong>
               </a>
            </div>
            <div class="item">
               <a href="{!! route('loan.index') !!}">
                  <div class="icon-wrapper bg-success">
                     <i class="fal fa-receipt"></i>
                  </div>
                  <strong>Loan History</strong>
               </a>
            </div>
         </div>
         <!-- * Wallet Footer -->
      </div>
   </div>
   <!-- Wallet Card -->
   <div class="section">
      <h2 class="title text-center mt-5 mb-5">What would you like to do ?</h2>
      <div class="row mt-2">
         <div class="col-4 mb-2">
            <a href="{!! route('loan.request') !!}">
               <div class="stat-box text-center">
                  <i class="fal fa-sack-dollar fa-2x"></i>
                  <p class="mb-1 text-sm">Request Loans</p>
               </div>
            </a>
         </div>
         {{-- <div class="col-4 mb-2">
            <div class="stat-box text-center">
               <i class="fal fa-mobile fa-2x"></i>
               <p class="mb-1 text-sm">Buy Airtime</p>
            </div>
         </div> --}}
         {{-- <div class="col-4 mb-2">
            <div class="stat-box text-center">
               <i class="fal fa-bolt fa-2x"></i>
               <p class="mb-1 text-sm">Buy Tokens</p>
            </div>
         </div> --}}
         <div class="col-4 mb-2">
            <div class="stat-box text-center">
               <i class="fal fa-car-building fa-2x"></i>
               <p class="mb-1 text-sm">Asset Finance</p>
            </div>
         </div>
         <div class="col-4 mb-2">
            <div class="stat-box text-center">
               <i class="fal fa-handshake fa-2x"></i>
               <p class="mb-2 text-sm">Invites</p>
            </div>
         </div>
         {{-- <div class="col-4 mb-2">
            <div class="stat-box text-center">
               <i class="fal fa-hand-holding-magic fa-2x"></i>
               <p class="mb-1 text-sm">Retirement Plan</p>
            </div>
         </div> --}}
         {{-- <div class="col-4 mb-2">
            <div class="stat-box text-center">
               <i class="fal fa-hands-heart fa-2x"></i>
               <p class="mb-1 text-sm">Get Insurance</p>
            </div>
         </div> --}}
      </div>
  </div>

  <!-- Transactions -->
   <div class="section mt-4 mb-4">
      <div class="section-heading">
         <h2 class="title">Recent Loan Applications</h2>
         <a href="{!! route('loan.index') !!}" class="link">View All</a>
      </div>
      <div class="transactions">
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
      </div>
   </div>
   <!-- * Transactions -->
@endsection
