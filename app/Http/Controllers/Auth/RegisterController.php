<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash; // * Hash kütüphanesini kullanmak için ekledik.
use App\Models\User; // * User modelini kullanmak için ekledik.

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
        $body = [
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password), // * bcrypt fonksiyonu ile şifreleme yapabiliriz.
            // 'password' => Hash::make($value) // * Hash kütüphanesini kullanarak şifreleme yapabiliriz.
        ];
        // $data = $request->except('_token'); // * except fonksiyonu ile belirtilen alanları hariç alabiliriz.

        return User::create($body); // * User modeli üzerinden create fonksiyonu ile veritabanına kayıt ekledik.
    }
}
