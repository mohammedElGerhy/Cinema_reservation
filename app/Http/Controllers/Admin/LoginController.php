<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
    public function getlogin (){
        return view('admin.auth.login');
    }

    public function login (LoginRequest $request){

        $remember_me = $request->has('remember_me')?true:false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request ->input('password')],$remember_me ))
         {
    return redirect() ->route('admin.dashboard');
          }

        return redirect() ->back()->with('error', 'بالبيانات  خطا هناك' );
    }
    public function logout (){
        auth()->guard('admin')->logout();
        return redirect() -> route('admin.login');
    }
/*
  $admin = new App\Models\Admin();
    $admin -> name ="Mohemmad";
    $admin -> email ="admin@mohammed.com";
    $admin -> password = bcrypt(12345678);
    $admin -> save();
 * */
}
