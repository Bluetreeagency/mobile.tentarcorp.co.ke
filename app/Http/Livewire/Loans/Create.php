<?php

namespace App\Http\Livewire\Loans;

use App\Models\loan_settings;
use App\Models\Loans;
use Livewire\Component;
use Carbon\Carbon;
use Auth;
use Helper;

class Create extends Component
{
   public $loan_type,$amount,$loan_reason,$payment_period;
   public function render()
   {
      $loanSettings = loan_settings::where('status','Active')->get();

      return view('livewire.loans.create', compact('loanSettings'));
   }


   public function restFields(){
      $this->loan_type      = '';
      $this->amount         = '';
      $this->loan_reason    = '';
      $this->payment_period = '';
   }

   public function store(){
      $this->validate([
         'loan_type' => 'required',
         'amount' => 'required',
         'loan_reason' => 'required',
         'payment_period' => 'required'
      ]);

      if(Auth::user()->loan_limit_dharura) {
         if($this->loan_type == 'Dharura'){
            $this->validate([
               'amount' => 'required|numeric|min:5000|max:'.Auth::user()->loan_limit_dharura
            ]);
         }

         if($this->loan_type == 'Mradi'){
            $this->validate([
               'amount' => 'required|numeric|min:30000|max:100000'
            ]);
         }
      }else{
         if($this->loan_type == 'Dharura'){
            $this->validate([
               'amount' => 'required|numeric|min:5000|max:30000'
            ]);
         }

         if($this->loan_type == 'Mradi'){
            $this->validate([
               'amount' => 'required|numeric|min:30000|max:100000'
            ]);
         }
      }

      $loanInfo = loan_settings::where('code',$this->loan_type)->first();

      $amount = $this->amount;
      $rate = $loanInfo->interest_rate;
      $interestAmount = $amount * $rate * $this->payment_period;
      $totalAmount = $interestAmount + $amount;

      $loan                   = new Loans();
      $loan->loan_code        = Helper::generateRandomString(30);
      $loan->user_code        = Auth::user()->user_code;
      $loan->type             = $this->loan_type;
      $loan->interest_amount  = $interestAmount;
      $loan->amount_applied   = $amount;
      $loan->repayment_amount = $totalAmount;
      $loan->balance          = $totalAmount;
      $loan->repayment_period = $this->payment_period;
      $loan->reason           = $this->loan_reason;
      $loan->application_date = Carbon::now();
      $loan->interest_rate    = $loanInfo->interest_rate;
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
