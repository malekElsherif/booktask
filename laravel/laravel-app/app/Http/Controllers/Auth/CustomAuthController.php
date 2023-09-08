<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
   public function site(){
    return view('site');
   }

   public function admin(){
    return view('books');
   }
   public function userLogin(){
    return view('auth.userLogin');
   }
   public function checkuserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/site');
        }
        return back()->withInput($request->only('email'));
    }
}

