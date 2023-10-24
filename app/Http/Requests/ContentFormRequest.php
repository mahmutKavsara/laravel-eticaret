<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'İsim Soyisim Zorunlu',
            'name.string' => 'İsim Soyisim Karakterlerden oluşmalı',
            'name.min' => 'İsim Soyisim Minimum 3 karakterden olmalıdır.',
            'email.required' => 'E-posta zorunlu',
            'email.email' => 'Geçersiz bir email adresi',
            'subject.required' => 'Konu kısmı boş geçilemez',
            'message.required' => 'Mesaj kısmı boş geçilemez',
        ];
    }
}
