<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class pagesController extends Controller
{
   //page
   public function home(){
      if(Auth::check()){
         return redirect()->route('dashboard.page');
      }
      return view('pages.home');
   }

   //support
   public function support(){
      return view('pages.support');
   }

   //test
   public function test(){

   }
}
