<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.*' => 'Email phải được nhập',
            'password.*' => 'Mật khẩu phải được nhập'
        ];
    }
}
