<?php

namespace App\Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }
}
