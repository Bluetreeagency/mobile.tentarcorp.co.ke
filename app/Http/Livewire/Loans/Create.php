<?php

namespace App\Http\Livewire\Loans;

use App\Models\Loan_settings;
use App\Models\Loans;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use Auth;
use Helper;
 
class Create extends Component
{
   public $loan_type,$amount,$loan_reason,$payment_period;
   public function render()
   {
      $loanSettings = Loan_settings::where('status','Active')->get();

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

      //validation rules
      if(Auth::user()->loan_limit_dharura > 0 || Auth::user()->loan_limit_mradi > 0) {
         if($this->loan_type == 'Dharura'){
            $this->validate([
               'amount' => 'required|numeric|min:5000|max:'.Auth::user()->loan_limit_dharura
            ]);
         }

         if($this->loan_type == 'Mradi'){
            $this->validate([
               'amount' => 'required|numeric|min:30000|max:'.Auth::user()->loan_limit_mradi
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
      $rate = $loanInfo->interest_rate/100;
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

      //message to the payee
      $customer = User::where('user_code',Auth::user()->user_code)->first();
      $phone = 254707998131;
      $payee = $customer->first_name.' '.$customer->last_name;
      $message= $payee.', Has applied a loan of Kshs.'.$amount;
      $sender_id='TENTACORP';
      $data = array(
      "api_key"=>"ZcCl9yxw86d2TjsmzJeXM4oFYQSrbqBuVn7GDkLAUOaPvfWNigIhH0R5tE1pK3",
      "service_id"=>0,
      "mobile"=>$phone,
      "response_type"=>"json",
      "shortcode"=>$sender_id,
      "message"=>$message
      );

      $data_json = json_encode($data);

      $url="https://api.tililtech.com/sms/v3/sendsms";

      $curl=curl_init();

      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      $result= curl_exec($curl);

      // Set Flash Message
      $this->dispatchBrowserEvent('alert',[
         'type'=>'success',
         'message'=>"Your Loan request has been submitted, It will be approved after being reviewed"
      ]);

      $this->restFields();

      return redirect()->route('loan.index');

   }
}
