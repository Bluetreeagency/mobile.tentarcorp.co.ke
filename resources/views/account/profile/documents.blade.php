@extends('layouts.app')
@section('title','Profile')
@section('header')
   @include('partials._header')
@endsection
@section('content')
   <div class="section mt-2 mb-5">
      <h2 class="title text-center mt-5 mb-3">Your Account Details</h2>
      <div class="card mb-3">
         <div class="card-body">
            <ul class="nav nav-tabs lined" role="tablist">
               <li class="nav-item">
                  <a class="nav-link" href="{!! route('profile.page') !!}" role="tab">
                     My Details
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="{!! route('documents.page') !!}" role="tab">
                     My Documents
                  </a>
               </li>
            </ul>
         </div>
      </div>
      {!! Form::model($documents, ['route' => ['profile.update.documents'], 'method'=>'post','enctype'=>'multipart/form-data']) !!}
         {!! csrf_field() !!}
         <div class="card mb-3">
            <div class="card-header">National ID</div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">Upload ID Front Image</label>
                  <input type="file" name="id_front_image" id="">
                  @if($documents->id_front_image)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->id_front_image) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
               <hr>
               <div class="form-group">
                  <label for="">Upload ID Back Image</label>
                  <input type="file" name="id_back_image" id="">
                  @if($documents->id_back_image)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->id_back_image) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
            </div>
         </div>
         <div class="card mb-3">
            <div class="card-header">Payslip</div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">Payslip 1</label>
                  <input type="file" name="payslip_1" id="">
                  @if($documents->payslip_1)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->payslip_1) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
               <hr>
               <div class="form-group">
                  <label for="">Payslip 2</label>
                  <input type="file" name="payslip_2" id="">
                  @if($documents->payslip_2)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->payslip_2) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
               <hr>
               <div class="form-group">
                  <label for="">Payslip 3</label>
                  <input type="file" name="payslip_3" id="">
                  @if($documents->payslip_3)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->payslip_3) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
            </div>
         </div>
         <div class="card mb-3">
            <div class="card-header">
               @if(Auth::user()->membership_type == 'Civilian')
                  Staff Card Copy
               @else
                  Service Card Copy
               @endif
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">
                     @if(Auth::user()->membership_type == 'Civilian')
                        Staff Card Copy
                     @else
                        Service Card Copy
                     @endif
                  </label>
                  <input type="file" name="service_card" id="">
                  @if($documents->service_card)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->service_card) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
            </div>
         </div>
         <div class="card mb-3">
            <div class="card-header">KRA Pin</div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">KRA Pin</label>
                  <input type="file" name="kra_pin" id="">
                  @if($documents->kra_pin)
                     <a href="{!! asset('account/'.Auth::user()->user_code.'/documents/'.$documents->kra_pin) !!}" target="_blank" class="text-warning text-center"><i>View Document</i></a>
                  @endif
               </div>
            </div>
         </div>

         <button type="submit" class="btn btn-sm btn-block btn-primary mt-3 mb-4 submit">Update Documents</button>
         <center><img src="{!! asset('assets/img/btn-loader.gif') !!}" class="img-responsive submit-load none mt-3" alt="loader" style="width:30%"></center>

      {!! Form::close() !!}
   </div>
@endsection
