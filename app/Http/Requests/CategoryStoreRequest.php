<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'slug' => ['sometimes', 'nullable', 'string', 'max:255', 'min:2', 'unique:categories,slug'],
            'short_description' => ['sometimes', 'nullable', 'string', 'max:255', 'min:2'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255', 'min:2'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Kategori adı zorunludur.',
            'name.string' => 'Kategori adı metin olmalıdır.',
            'name.max' => 'Kategori adı en fazla 255 karakter olmalıdır.',
            'name.min' => 'Kategori adı en az 2 karakter olmalıdır.',
            'slug.string' => 'Kategori slug metin olmalıdır.',
            'slug.max' => 'Kategori slug en fazla 255 karakter olmalıdır.',
            'slug.min' => 'Kategori slug en az 2 karakter olmalıdır.',
            'slug.unique' => 'Kategori slug benzersiz olmalıdır.',
            'short_description.string' => 'Kategori kısa açıklama metin olmalıdır.',
            'short_description.max' => 'Kategori kısa açıklama en fazla 255 karakter olmalıdır.',
            'short_description.min' => 'Kategori kısa açıklama en az 2 karakter olmalıdır.',
            'description.string' => 'Kategori açıklama metin olmalıdır.',
            'description.max' => 'Kategori açıklama en fazla 255 karakter olmalıdır.',
            'description.min' => 'Kategori açıklama en az 2 karakter olmalıdır.',
        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    public function prepareForValidation() // Doğrulamaya hazırlan
    {
        if(!is_null($this->slug)){ // Eğer slug boş değilse
            $this->merge([ // Birleştir
                'slug' => Str::slug($this->slug) // Slug'ı oluştur
            ]);
        }
    }
}
