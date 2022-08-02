<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauhinhRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ho_va_ten' => 'required',
            'mo_ta' => 'required',
        ];
    }
}
