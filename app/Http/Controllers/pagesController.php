<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

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

   //sendOTP
   public function sendOTP(Request $request){
      $this->validate($request,[
         'id_number' => 'required',
      ]);

      $check =  User::where('id_number',$request->id_number);

      if($check->count() == 0){
         Session::flash('error','ID number does not exist');
         return redirect()->back();
      }

      $user = $check->first();

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

      return redirect()->route('password.otp');
   }

   //
   public function password_otp(){
      return view('pages.password_otp');
   }

   //verify otp
   public function verify_OTP(Request $request){
      $check =  User::where('otp_code',$request->otp);
      if($check->count() == 0){
         Session::flash('error','ID number does not exist');
         return redirect()->back();
      }

      if($check->count() == 1){
         return redirect()->route('password.reset.page',$request->otp);
      }
   }

   //password reset page
   public function password_reset($otp){
      return view('pages.password_reset',compact('otp'));
   }

   //reset password
   public function reset_new_password(Request $request){
      $this->validate($request,[
         'password' => 'required|confirmed',
      ]);

      $check =  User::where('otp_code',$request->code);
      if($check->count() == 0){
         Session::flash('error','ID number does not exist');
         return redirect()->back();
      }

      $user = $check->first();
      $user->otp_code = null;
      $user->password = Hash::make($request->password);
      $user->save();

      Session::flash('success','Password has been reset successfully');

      return redirect()->route('login');
   }
}
