<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
   //page
   public function home(){
      return view('pages.home');
   }

   //test
   public function test(){
      
   }
}
