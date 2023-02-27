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
               <h2 class="total blurred" id="Blur">ksh {!! number_format($balance) !!}</h2>
            </div>
            <div class="right">
               <a href="#" class="button" onclick="toggleBlur()">
                  <i class="far fa-eye"></i>
               </a>
            </div>
         </div>
         <!-- * Balance -->
         <!-- Wallet Footer -->
         <div class="wallet-footer">
            <div class="item">
               <a href="#" data-bs-toggle="modal" data-bs-target="#repayLoan">
                  <div class="icon-wrapper bg-danger">
                     <i class="fal fa-usd-circle"></i>
                  </div>
                  <strong>Repay Loan</strong>
               </a>
            </div>
            <div class="item">
               <a href="{!! route('loan.request') !!}">
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

    <!-- Modal -->
    <div class="modal fade" id="repayLoan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Loan Repayment</h3>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Express Pay</button>
                     <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Paybill</button>
                  </div>
               </nav>
               <div class="tab-content mt-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                     <form method="POST" action="{!! route('loan.repayment') !!}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label for="">Amount To Pay</label>
                           <input type="number" name="amount_paid" class="form-control" placeholder="Enter Amount" max="{!! Loan::userLoanBalance() !!}" required>
                        </div>
                        <center>
                           <button class="btn btn-sm btn-block btn-primary mt-3 mb-4" type="submit"> Make Payment</button>
                        </center>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                     <table class="table card-table table-bordered">
                        <tbody>
                           <tr>
                              <td width="1">1</td>
                              <td>Go to Safaricom <i class="fal fa-arrow-right"></i> Mpesa Menu</td>
                           </tr>
                           <tr>
                              <td>2</td>
                              <td>Select Lipa na M-PESA</td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>Select Paybill</td>
                           </tr>
                           <tr>
                              <td>4</td>
                              <td>Enter Business Number <b class="text-bold">4100123</b></td>
                           </tr>
                           <tr>
                              <td>5</td>
                              <td>Enter Account Number <b class="text-bold">{!! Auth::user()->id_number !!}</b></td>
                           </tr>
                           <tr>
                              <td>6</td>
                              <td> Enter Amount <b class="text-bold">ksh. {!! number_format($balance) !!}</b>
                              </td>
                           </tr>
                           <tr>
                              <td>7</td>
                              <td>Enter Your M-PESA Pin</td>
                           </tr>
                           <tr>
                              <td>8</td>
                              <td>Wait for confirmation from Mpesa</td>
                           </tr>
                           <tr>
                              <td>9</td>
                              <td><center><a class="btn btn-success btn-sm" href="{!! route('dashboard.page') !!}">Confirm Payment</a></center></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection
