<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Session;
class accountController extends Controller
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

   //blank
   public function blank(){
      return view('blank');
   }

   //dashboard
   public function dashboard(){

      //check Phone Validation
      if(!Auth::user()->phone_number_verified_at){
         return view('account.otp');
      }

      return view('account.dashboard');
   }

   //verify phone number
   public function otp_verification(Request $request){
      $this->validate($request,[
         'otp' => 'required',
      ]);

      $query = User::where('user_code',Auth::user()->user_code)->where('otp_code',$request->otp);
      if($query->count() == 0){
         Session::flash('warning','Please check the provided OTP, or resend the code again !!');

         return redirect()->back();
      }

      if($query->count() == 1){
         $update = $query->first();
         $update->phone_number_verified_at = Carbon::now();
         $update->otp_code = "";
         $update->save();
      }

      return redirect()->route('dashboard.page');
   }

   //resend otp
   public function resend_otp(){
      $user =  User::where('user_code',Auth::user()->user_code)->first();

      //return $user->phone_number;

      $otp = random_int(1000, 9999);

      $message = 'Your OTP is '.$otp;

      $url = 'https://api.tililtech.com/sms/v3/sendsms';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      $curl_post_data = [
         'api_key'       => 'ZcCl9yxw86d2TjsmzJeXM4oFYQSrbqBuVn7GDkLAUOaPvfWNigIhH0R5tE1pK3',
         'service_id'    => 0,
         'mobile'        => $user->phone_number,
         'response_type' => 'json',
         'shortcode'     => 'TENTACORP',
         'message'       => $message,
      ];

      $data_string = json_encode($curl_post_data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
      $curl_response = curl_exec($curl);
      $data = json_decode($curl_response,true);

      $user->otp_code = $otp;
      $user->save();

      Session::flash('success','OTP code has been sent to '.substr($user->phone_number, 0, 6).'******'.substr($user->phone_number,-2));

      return redirect()->back();
   }
}
