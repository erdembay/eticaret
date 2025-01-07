<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if(!$user->hasVerifiedEmail()){
                Auth::logout();
                alert()->warning('Uyarı', 'Lütfen e-posta adresinizi doğrulayın.')->showConfirmButton('Tamam');
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login')->withErrors('E-posta adresi veya şifre hatalı.');
        }
        return redirect()->intended('/admin');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
