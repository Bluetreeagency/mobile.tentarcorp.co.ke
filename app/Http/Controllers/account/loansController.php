<?php

namespace App\Http\Controllers\account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Loans;
use App\Helpers\Loan;
use Carbon\Carbon;
use Session;

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
      //check if has balance
      // $check = Loan::userLoanBalance();
      // if($check > 0){
      //    Session::flash('warning', 'You have an outstanding loan balance of Ksh. '.$check);
      //    return redirect()->back();
      // }
      return view('account.loans.create');
   }

   /**
   *
   * password
   *
   * */
   public function password()
   {
      $lipa_time = Carbon::rawParse('now')->format('YmdHms');
      $passkey= "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
      $BusinessShortCode = 174379;
      $timestamp =$lipa_time;
      $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
      return $lipa_na_mpesa_password;
   }

   /**
   *
   * Show the form for editing the specified resource.
   *
   * */
   public function generateAccessToken()
   {

      $consumer_key= "TBCGevdXMLfESMZPj5G96KUenvj2BrGI";
      $consumer_secret= "s62sxhjwKAnkDbA8";

      $credentials = base64_encode($consumer_key.":".$consumer_secret);

      $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
      //$url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
      curl_setopt($curl, CURLOPT_HEADER,false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $curl_response = curl_exec($curl);
      $access_token=json_decode($curl_response);

      return $access_token->access_token;
   }

   //repay loan stkPush
   public function loan_repayment(Request $request){

      $amount   = $request->amount_paid;
      $phone    = Auth::user()->phone_number;
      $callback = 'https://control.tentacorp.com/api/stkpush/callback';
      $ref      = Auth::user()->id_number;
      $desc     = 'Loan Repayment';
      $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
      //$url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
      $curl_post_data = [
         'BusinessShortCode' => 174379,
         'Password' => $this->password(),
         'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
         'TransactionType' => 'CustomerPayBillOnline',
         'Amount' => $amount,
         'PartyA' => $phone, // replace this with your phone number
         'PartyB' => 174379,
         'PhoneNumber' => $phone, // replace this with your phone number
         'CallBackURL' => $callback,
         'AccountReference' => $ref,
         'TransactionDesc' => $desc
      ];;

      $data_string = json_encode($curl_post_data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
      $curl_response = curl_exec($curl);
      $data = json_decode($curl_response,true);

      if(isset($data['errorMessage'])){
         Session::flash('error',$data['errorMessage']);

         return redirect()->back();
      }

      if(isset($data['ResponseCode'])){
         $mpesaData = Loans::where('user_code',Auth::user()->user_code)->whereNull('payment_status')->first();
         $mpesaData->CheckoutRequestID = $data['CheckoutRequestID'];
         $mpesaData->save();

         if($data['ResponseCode'] == 0){
            Session::flash('success','Amount has been sent to '.$phone);

            return redirect()->back();
         }
      }
   }
}
