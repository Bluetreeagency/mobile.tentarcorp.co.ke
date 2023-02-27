<?php

namespace App\Http\Controllers\account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loans;
use Carbon\Carbon;
use App\Models\User;
use Helper;
use Session;
use Auth;
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
      $loans = Loans::where('user_code',Auth::user()->user_code)->limit(4)->get();
      $balanceQuery = Loans::where('user_code',Auth::user()->user_code)->where('loan_status','Approved');
      if($balanceQuery->count() > 0){
         $balance = $balanceQuery->sum('balance');
      }else{
         $balance = 0;
      }
      return view('account.dashboard', compact('loans','balance'));
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

   //profile
   public function profile(){
      $profile = Auth::user();

      return view('account.profile.profile', compact('profile'));
   }

   //update profile
   public function update_profile(Request $request){
      $this->validate($request,[
         'gender'            => 'required',
         'dob'               => 'required',
         'residence_address' => 'required',
      ]);

      $profile                              = Auth::user();
      // profile_picture
      if(!empty($request->profile_picture)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('profile_picture');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $profile->avatar = $fileName;
      }
      $profile->dob                         = $request->dob;
      $profile->gender                      = $request->gender;
      $profile->alternative_number          = $request->alternative_number;
      $profile->residence_address           = $request->residence_address;
      $profile->postal_address              = $request->postal_address;
      $profile->svc_number                  = $request->svc_number;
      $profile->email                       = $request->email;
      $profile->work_station                = $request->work_station;
      $profile->next_of_kin_1_full_name     = $request->next_of_kin_1_full_name;
      $profile->next_of_kin_1_mobile_number = $request->next_of_kin_1_mobile_number;
      $profile->next_of_kin_1_relationship  = $request->next_of_kin_1_relationship;
      $profile->next_of_kin_2_full_name     = $request->next_of_kin_2_full_name;
      $profile->next_of_kin_2_mobile_number = $request->next_of_kin_2_mobile_number;
      $profile->next_of_kin_2_relationship  = $request->next_of_kin_2_relationship;
      $profile->save();

      Session::flash('success','Profile details updated successfully');

      return redirect()->back();
   }

   //documents
   public function documents(){
      $documents = Auth::user();
      return view('account.profile.documents', compact('documents'));
   }

   //update documents
   public function update_documents(Request $request){
      $documents = Auth::user();

      // ID front image
      if(!empty($request->id_front_image)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('id_front_image');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->id_front_image = $fileName;
      }

      //ID back image
      if(!empty($request->id_back_image)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('id_back_image');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->id_back_image = $fileName;
      }

      //payslip 1
      if(!empty($request->payslip_1)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('payslip_1');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->payslip_1 = $fileName;
      }

      //payslip 2
      if(!empty($request->payslip_2)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('payslip_2');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->payslip_2 = $fileName;
      }

      //payslip 2
      if(!empty($request->payslip_3)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('payslip_3');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->payslip_3 = $fileName;
      }

      //service card
      if(!empty($request->service_card)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('service_card');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->service_card = $fileName;
      }

      //service card
      if(!empty($request->kra_pin)){
			$path = base_path().'/public/account/'.Auth::user()->user_code.'/documents/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('kra_pin');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Helper::generateRandomString(). '.' . $extension;

         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $documents->kra_pin = $fileName;
      }

      $documents->save();

      Session::flash('success','Documents successfully upload');

      return redirect()->back();
   }
}
