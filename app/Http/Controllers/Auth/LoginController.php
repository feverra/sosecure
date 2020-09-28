<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {   
        $user = $request->email;
        $pass = $request->password;

        $checkLoginSQL = "SELECT * FROM users WHERE email = '$user' AND password = '$pass'";
        $sql = DB::select($checkLoginSQL);
        if($sql){
            $user = User::find($sql[0]->id);
            if($user->type == 1){
                session()->put('login_user', base64_encode($user));
                return redirect('/admin/dashboard'); 
            }else{
                session()->put('login_user', base64_encode($user));
                return redirect('/'); 
            }
        }else{
            return redirect('/login')->withErrors(['msg' => 'อีเมล หรือ รหัสผ่านไม่ถูกต้อง']);  
        }
        
    }

    public function logout(){
        session()->flush('login_user');
        return redirect('/'); 
    }

    // protected function redirectTo()
    // {
    //     if(auth()->user()->isAdmin()) {
    //         return '/admin/dashboard';
    //     } else {
    //         return '/';
    //     }
    // }
}
