@extends('layouts.app')
@section('title','Loan Request')
@section('header')
   @include('partials._header')
@endsection
@section('content')
   <div class="section mt-2 mb-2">
      <h2 class="title text-center mt-5 mb-3">Loan Application</h2>
      @include('partials._messages')
      @livewire('loans.create')
   </div>
@endsection
