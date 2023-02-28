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
               </div>
               <hr>
               <div class="form-group">
                  <label for="">Upload ID Back Image</label>
                  <input type="file" name="id_back_image" id="">
               </div>
            </div>
         </div>
         <div class="card mb-3">
            <div class="card-header">Payslip</div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">Payslip 1</label>
                  <input type="file" name="payslip_1" id="">
               </div>
               <hr>
               <div class="form-group">
                  <label for="">Payslip 2</label>
                  <input type="file" name="payslip_2" id="">
               </div>
               <hr>
               <div class="form-group">
                  <label for="">Payslip 3</label>
                  <input type="file" name="payslip_3" id="">
               </div>
            </div>
         </div>
         <div class="card mb-3">
            <div class="card-header">Service Card Copy</div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">Service Card Image</label>
                  <input type="file" name="service_card" id="">
               </div>
            </div>
         </div>
         <div class="card mb-3">
            <div class="card-header">KRA Pin</div>
            <div class="card-body">
               <div class="form-group">
                  <label for="">KRA Pin</label>
                  <input type="file" name="kra_pin" id="">
               </div>
            </div>
         </div>

         <button type="submit" class="btn btn-sm btn-block btn-primary mt-3 mb-4 submit">Update Documents</button>
         <center><img src="{!! asset('assets/img/btn-loader.gif') !!}" class="img-responsive submit-load none mt-3" alt="loader" style="width:30%"></center>

      {!! Form::close() !!}
   </div>
@endsection
