@extends('layouts.app')
@section('title','Profile')
@section('header')
   @include('partials._header')
@endsection
@section('content')
   <div class="section mt-2 mb-2">
      <h2 class="title text-center mt-5 mb-3">Your Account Details</h2>
      <div class="card mb-3">
         <div class="card-body">
            <ul class="nav nav-tabs lined" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" href="{!! route('profile.page') !!}" role="tab">
                     My Details
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{!! route('documents.page') !!}" role="tab">
                     My Documents
                  </a>
               </li>
            </ul>
         </div>
      </div>
      <div class="section mt-3 text-center mb-3">
         <div class="avatar-section">
            <a href="#">
               @if(Auth::user()->avatar)
                  <img src="{!! asset('account/'.Auth::user()->user_code.'/documents/'.Auth::user()->avatar) !!}" alt="{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}" class="imaged w100 rounded">
               @else
                  <img src="https://ui-avatars.com/api/?name={!! Auth::user()->first_name.' '.Auth::user()->last_name !!}&rounded=true&size=40" alt="{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}" class="imaged w100 rounded">
               @endif
            </a>
         </div>
      </div>
      {!! Form::model($profile, ['route' => ['profile.update'], 'method'=>'post','enctype'=>'multipart/form-data']) !!}
         {!! csrf_field() !!}
         <div class="card">
            <div class="card-body">
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Upload Your Profile Picture</label>
                     {!! Form::file('profile_picture',null,['class'=>'form-control']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Date of Birth</label>
                     {!! Form::date('dob',null,['class'=>'form-control','required'=>'']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary" for="select4">Gender</label>
                     {!! Form::select('gender',[''=>'Choose','Female'=>'Female','Male'=>'Male'],null,['class'=>'form-control custom-select','required'=>'']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Mobile Number</label>
                     <input value="{!! Auth::user()->phone_number !!}" class="form-control" disabled>
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Alternative Number</label>
                     <input type="tel" id="phone" name="alternative_number">
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Residence Address</label>
                     {!! Form::text('residence_address',null,['class'=>'form-control','required'=>'','placeholder'=>'Enter Residence Address']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Postal Address</label>
                     {!! Form::text('postal_address',null,['class'=>'form-control','required'=>'','placeholder'=>'Enter Postal Address']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">SVC Number</label>
                     {!! Form::text('svc_number',null,['class'=>'form-control','required'=>'','placeholder'=>'Enter SVC Number']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">National ID No</label>
                     <input type="text" name="national_id_no" class="form-control" value="{!! Auth::user()->national_id !!}" placeholder="Enter National ID No" disabled>
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Email</label>
                     {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter email']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Work Station</label>
                     {!! Form::select('work_station',[''=>'Choose Station','D.O.D'=>'D.O.D','Embakasi'=>'Embakasi','Langata'=>'Langata','Kahawa'=>'Kahawa','Moi Air Base'=>'Moi Air Base'],null,['class'=>'form-control custom-select','required'=>'']) !!}
                  </div>
               </div>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-header">Next of kin Details</div>
            <div class="card-body">
               <h3 class="text-center mb-3">Next of kin 1</h3>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Full Names</label>
                     {!! Form::text('next_of_kin_1_full_name',null,['class'=>'form-control','placeholder'=>'Enter Full name']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Mobile Number</label>
                     {!! Form::text('next_of_kin_1_mobile_number',null,['class'=>'form-control','placeholder'=>'Enter Mobile Number']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Relationship</label>
                     {!! Form::select('next_of_kin_1_relationship',[''=>'Choose Relationship','Father'=>'Father','Mother'=>'Mother','Son'=>'Son','Daughter'=>'Daughter','Cousin'=>'Cousin','Grand Father'=>'Grand Father','Grand Mother'=>'Grand Mother','Uncle'=>'Uncle','Aunt'=>'Aunt','Wife'=>'Wife','Husband'=>'Husband','Friend'=>'Friend','Brother'=>'Brother','Sister'=>'Sister'],null,['class'=>'form-control','placeholder'=>'Enter Mobile Number']) !!}
                  </div>
               </div>
               <h3 class="text-center mt-4">Next of kin 2</h3>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Full Names</label>
                     {!! Form::text('next_of_kin_2_full_name',null,['class'=>'form-control','placeholder'=>'Enter Full name']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Mobile Number</label>
                     {!! Form::text('next_of_kin_2_mobile_number',null,['class'=>'form-control','placeholder'=>'Enter Mobile Number']) !!}
                  </div>
               </div>
               <div class="form-group basic">
                  <div class="input-wrapper">
                     <label class="label text-primary">Relationship</label>
                     {!! Form::select('next_of_kin_2_relationship',[''=>'Choose Relationship','Father'=>'Father','Mother'=>'Mother','Son'=>'Son','Daughter'=>'Daughter','Cousin'=>'Cousin','Grand Father'=>'Grand Father','Grand Mother'=>'Grand Mother','Uncle'=>'Uncle','Aunt'=>'Aunt','Wife'=>'Wife','Husband'=>'Husband','Friend'=>'Friend','Brother'=>'Brother','Sister'=>'Sister'],null,['class'=>'form-control','placeholder'=>'Enter Mobile Number']) !!}
                  </div>
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-sm btn-block btn-primary mt-3 mb-4">Update Profile</button>
      {!! Form::close() !!}
   </div>
@endsection
