<?php

namespace App\Http\Livewire\Loans;

use App\Models\Loans;
use Livewire\Component;
use Carbon\Carbon;
use Auth;
use Helper;

class Create extends Component
{
   public $loan_type,$amount,$loan_reason;
   public function render()
   {
      return view('livewire.loans.create');
   }


   public function restFields(){
      $this->loan_type      = '';
      $this->amount         = '';
      $this->loan_reason    = '';
   }

   public function store(){
      $this->validate([
         'loan_type' => 'required',
         'amount' => 'required',
         'loan_reason' => 'required',
      ]);

      if($this->loan_type == 'Dharura'){
         $paymentPeriod = 1;
      }elseif($this->loan_type == 'Miradi'){
         $paymentPeriod = 3;
      }else{
         $paymentPeriod = 0;
      }

      $amount = $this->amount;
      $rate = 0.125;
      $interestAmount = $amount * $rate * $paymentPeriod;
      $totalAmount = $interestAmount + $amount;

      $loan                   = new Loans();
      $loan->loan_code        = Helper::generateRandomString(30);
      $loan->user_code        = Auth::user()->user_code;
      $loan->type             = $this->loan_type;
      $loan->interest_amount  = number_format($interestAmount);
      $loan->amount_applied   = number_format($amount);
      $loan->repayment_amount = number_format($totalAmount);
      $loan->balance          = number_format($totalAmount);
      $loan->repayment_period = $paymentPeriod;
      $loan->reason           = $this->loan_reason;
      $loan->application_date = Carbon::now();
      $loan->interest_rate    = 12.5;
      $loan->save();

      // Set Flash Message
      $this->dispatchBrowserEvent('alert',[
         'type'=>'success',
         'message'=>"Your Loan request has been submitted, I will be approved after being reviewed"
      ]);

      $this->restFields();

      return redirect()->route('loan.index');

   }
}
