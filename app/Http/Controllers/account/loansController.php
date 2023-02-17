<?php

namespace App\Http\Controllers\account;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loansController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }

   //index
   public function index(){
      $loans = Loans::where('user_code',Auth::user()->user_code)->get();

      return view('account.loans.index', compact('loans'));
   }

   //create
   public function create(){
      return view('account.loans.create');
   }

   //store
   public function store(Request $request){

      return redirect()->route();

   }
}
