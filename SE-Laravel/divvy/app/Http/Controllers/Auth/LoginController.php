<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\IsAdmin;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password'])))
        {
          switch(auth()->user()->is_admin)
          {
            case 1: return redirect()->route('home'); break;
            case 2: return redirect()->route('finance.home'); break;
            case 3: return redirect()->route('document.home'); break;
            case 4: return redirect()->route('admin.home'); break;
            default: break;
          }
        }
        else{
            return redirect()->route('login')->with('error',"Email or Password are wrong"); 
        }
    }
}
