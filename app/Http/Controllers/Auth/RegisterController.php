<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash; // * Hash kütüphanesini kullanmak için ekledik.
use App\Models\User; // * User modelini kullanmak için ekledik.
use App\Events\UserRegisterEvent; // * UserRegisterEvent eventini kullanmak için ekledik.

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'password'); // * only fonksiyonu ile sadece belirtilen alanları alabiliriz.
        // $data = $request->except('_token'); // * except fonksiyonu ile belirtilen alanları hariç alabiliriz.
        $user = User::create($data); // * User modeli üzerinden create fonksiyonu ile veritabanına kayıt ekledik.
        event(new UserRegisterEvent($user)); // * UserRegisterEvent eventini tetikledik.
    }
}
