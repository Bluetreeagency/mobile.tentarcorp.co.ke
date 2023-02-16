<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function login(Request $request)
   {
      $input = $request->all();

      $this->validate($request, [
         'id_number' => 'required',
         'password' => 'required',
      ]);

      $fieldType = filter_var($request->id_number, FILTER_VALIDATE_EMAIL) ? 'email' : 'id_number';
      if(auth()->attempt(array($fieldType =>$input['id_number'],'password' => $input['password'])))
      {
         return redirect()->route('dashboard.page');
      }else{
         return redirect()->route('login')
               ->with('error','Email-Address And Password Are Wrong.');
      }

   }

   function authenticated(Request $request, $user)
   {
      $user->last_login = Carbon::now();
      $user->last_login_ip = $request->getClientIp();
      $user->save();
   }
}

