<?php

namespace App\Helpers;
use App\Models\Loans;
use Auth;
class Loan
{
   //user loan balance
   public static function userLoanBalance(){
      $balanceQuery = Loans::where('user_code',Auth::user()->user_code)->where('loan_status','Approved');
      if($balanceQuery->count() > 0){
         $balance = $balanceQuery->sum('balance');
      }else{
         $balance = 0;
      }

      return $balance;
   }

}


