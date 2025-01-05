<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash; // * Hash kütüphanesini kullanmak için ekledik.
use App\Models\User; // * User modelini kullanmak için ekledik.
use App\Events\UserRegisterEvent; // * UserRegisterEvent eventini kullanmak için ekledik.
use Illuminate\Support\Facades\Cache; // * Cache kütüphanesini kullanmak için ekledik.
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
        // event(new UserRegisterEvent($user)); // * UserRegisterEvent eventini tetikledik.
        
        dd('Kayıt işlemi başarılı.');
    }
    public function activation(Request $request, $token)
    {
        $userId = Cache::get('activation_token_'. $token); // * Cache üzerinden tokeni alıyoruz.
        if (!$userId) {
            dd('Token süresi dolmuş veya hatalı token.');
        }
        $user = User::findOrFail($userId); // * Kullanıcıyı buluyoruz. Eğer kullanıcı yoksa hata dönecektir.
        $user->email_verified_at = now(); // * email_verified_at alanını güncelliyoruz.
        $user->save(); // * Kullanıcıyı kaydediyoruz.
        Cache::forget('activation_token_'. $token); // * Cache üzerinden tokeni siliyoruz.
        dd('Aktivasyon işlemi başarılı.');
    }
}
