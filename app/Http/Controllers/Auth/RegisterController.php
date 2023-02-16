<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   use RegistersUsers;

   /**
    * Where to redirect users after registration.
    *
    * @var string
    */
   protected $redirectTo = RouteServiceProvider::HOME;

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('guest');
   }

   /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
   protected function signup(Request $request)
   {
      $this->validate($request, [
         'first_name'      => 'required', 'string', 'max:255',
         'last_name'       => 'required', 'string', 'max:255',
         'phone_number'    => 'required', 'string', 'max:255',
         'id_number'       => 'required', 'string', 'max:255',
         'membership_type' => 'required', 'string', 'max:255',
         'password'        => 'required', 'string', 'min:4', 'confirmed',
      ]);

      //token
      $token = Helper::generateRandomString(30);

      //check phone number
      $checkPhoneNumber = User::where('phone_number',$request->phone_number)->count();
      if($checkPhoneNumber != 0){
         Session::flash('warning','The provided phone number your entered is already in use');

         return redirect()->back();
      }

      //check ID Number
      $checkIDNumber = User::where('id_number',$request->id_number)->count();
      if($checkIDNumber != 0){
         Session::flash('warning','The provided ID Number your entered is already in use');

         return redirect()->back();
      }

      $otp = random_int(1000, 9999);

      //add to user table
      $user = new User;
      $user->first_name      = $request->first_name;
      $user->last_name       = $request->last_name;
      $user->username        = $request->id_number;
      $user->user_code       = $token;
      $user->phone_number    = $request->phone_number;
      $user->id_number       = $request->id_number;
      $user->membership_type = $request->membership_type;
      $user->otp_code        = $otp;
      $user->status          = 15;
      $user->password        = Hash::make($request->password);
      $user->remember_token  = $token;
      $user->save();

      //send OTP
      
      $message = 'Your OTP is '.$otp;

      $url = 'https://api.tililtech.com/sms/v3/sendsms';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      $curl_post_data = [
         'api_key'       => 'ZcCl9yxw86d2TjsmzJeXM4oFYQSrbqBuVn7GDkLAUOaPvfWNigIhH0R5tE1pK3',
         'service_id'    => 0,
         'mobile'        => $request->phone_number,
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

      Session::flash('success','Your account has been created you can now login');

      return redirect()->route('login');
   }
}
