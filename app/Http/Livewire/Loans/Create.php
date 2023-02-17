<?php

namespace App\Http\Livewire\Loans;

use App\Models\Loans;
use Livewire\Component;
use Carbon\Carbon;
use Auth;
use Helper;

class Create extends Component
{
   public $loan_type,$amount,$payment_period,$loan_reason;
   public function render()
   {
      return view('livewire.loans.create');
   }


   public function restFields(){
      $this->loan_type      = '';
      $this->amount         = '';
      $this->payment_period = '';
      $this->loan_reason    = '';
   }

   public function store(){
      $this->validate([
         'loan_type' => 'required',
         'amount' => 'required',
         'payment_period' => 'required',
         'loan_reason' => 'required',
      ]);

      $loan                   = new Loans();
      $loan->loan_code        = Helper::generateRandomString(30);
      $loan->user_code        = Auth::user()->user_code;
      $loan->type             = $this->loan_type;
      $loan->amount_applied   = $this->amount;
      $loan->repayment_period = $this->payment_period;
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
