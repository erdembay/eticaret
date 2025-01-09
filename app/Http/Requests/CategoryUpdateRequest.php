<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryUpdateRequest extends FormRequest
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
            //
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'short_description' => ['sometimes', 'nullable', 'string', 'max:255', 'min:2'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255', 'min:2'],
            'slug' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
                'min:2',
                'unique:categories,slug,' . $this->category->id
            ],
        ];
    }
    public function prepareForValidation() // Doğrulamaya hazırlan
    {
        if(!is_null($this->slug)){ // Eğer slug boş değilse
            $this->merge([ // Birleştir
                'slug' => Str::slug($this->slug) // Slug'ı oluştur
            ]);
        }
    }
}
