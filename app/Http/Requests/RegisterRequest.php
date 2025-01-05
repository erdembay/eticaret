<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2',  'max:125'],
            'email' => ['required', 'string', 'email', 'min:2', 'max:125', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad Soyad alanı zorunludur.',
            'name.min' => 'Ad Soyad alanı en az 2 karakter olmalıdır.',
            'name.max' => 'Ad Soyad alanı en fazla 125 karakter olmalıdır.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'E-posta alanı geçerli bir e-posta adresi olmalıdır.',
            'email.min' => 'E-posta alanı en az 2 karakter olmalıdır.',
            'email.max' => 'E-posta alanı en fazla 125 karakter olmalıdır.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.confirmed' => 'Şifreler uyuşmuyor.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.mixed_case' => 'Şifre en az bir büyük harf ve bir küçük harf içermelidir.',
            'password.letters' => 'Şifre en az bir harf içermelidir.',
            'password.numbers' => 'Şifre en az bir rakam içermelidir.',
            'password.symbols' => 'Şifre en az bir sembol içermelidir.'
        ];
    }
}
