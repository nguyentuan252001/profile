<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ho_va_ten' => 'required|min:5',
            'email' => 'required|email|unique:accounts,email,',
            'password' => 'required|min:6|max:30',
            're_password' => 'required|same:password',
            'so_dien_thoai' => 'required|digits:10|unique:accounts,so_dien_thoai,',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*' => 'Họ và tên phải nhập ít nhất 5 kí tự',
            'email.*' => 'Vui lòng nhập đúng Email',
            'password.*' => 'Vui lòng nhập ít nhất 8 kí tự và tối đa 30 kí tự',
            're_password.*' => 'Nhập lại mật khẩu không chính xác',
            'so_dien_thoai.*' => 'Vui Lòng nhập đúng số điện thoại',
        ];
    }
}
