<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
        if($user->hasRole(['super-admin', 'product-manager', 'order-manager', 'user-manager', 'category-manager'])){ // Super Admin Role Check
            return redirect()->route('admin.index');
        }
        return redirect()->route('order.index');
        // return redirect()->intended('/admin');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    public function socialite($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    public function socialiteVerify($driver)
    {
        $user = Socialite::driver($driver)->user();
        $authUser = User::query()
            ->where('email', $user->getEmail())
            ->first();
        if($authUser){
            Auth::login($authUser);
            return redirect()->route('index');
        }
        $newUser = User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
        ]);
        Auth::login($newUser);
        return redirect()->route('index');
    }
}
