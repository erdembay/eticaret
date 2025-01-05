<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash; // * Hash kütüphanesini kullanmak için ekledik.
use App\Models\User; // * User modelini kullanmak için ekledik.
use App\Events\UserRegisterEvent; // * UserRegisterEvent eventini kullanmak için ekledik.
use Illuminate\Support\Facades\Cache; // * Cache kütüphanesini kullanmak için ekledik.
use Illuminate\Support\Facades\Auth; // * Auth kütüphanesini kullanmak için ekledik.
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
        // $remember = $request->has('remember'); // * remember alanı varsa true yoksa false.
        // Auth::login($user, $remember); // * Kullanıcıyı oturum açtık.
        alert()->info('Kayıt işlemi başarılı.', 'Lütfen e-posta adresinize gelen maili onaylayın.'); // * SweetAlert ile mesaj verdik.
        return redirect()->back(); // * Kayıt işlemi başarılı mesajı ile birlikte geri dönüş yaptık.
    }
    public function activation(Request $request, $token)
    {
        $userId = Cache::get('activation_token_'. $token); // * Cache üzerinden tokeni alıyoruz.
        if (!$userId) {
            alert()->warning('Uyarı!', 'Token geçersiz ya da süresi dolmuş!'); // * SweetAlert ile mesaj verdik.
            return redirect()->route('register'); // * Kayıt sayfasına yönlendirme yaptık.
        }
        $user = User::findOrFail($userId); // * Kullanıcıyı buluyoruz. Eğer kullanıcı yoksa hata dönecektir.
        $user->email_verified_at = now(); // * email_verified_at alanını güncelliyoruz.
        $user->save(); // * Kullanıcıyı kaydediyoruz.
        Cache::forget('activation_token_'. $token); // * Cache üzerinden tokeni siliyoruz.
        Auth::login($user); // * Kullanıcıyı oturum açtık.
        alert()->success('Başarılı!', 'E-posta adresiniz onaylandı.'); // * SweetAlert ile mesaj verdik.
        return redirect()->route('admin.index'); // * Giriş sayfasına yönlendirme yaptık.
    }
}
