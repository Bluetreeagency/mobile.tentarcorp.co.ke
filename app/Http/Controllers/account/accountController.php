<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountController extends Controller
{
   //blank
   public function blank(){
      return view('blank');
   }

   //dashboard
   public function dashboard(){
      return view('account.dashboard');
   }
}
