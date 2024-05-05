<?php

namespace App\Modules\MoodDiary\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViewPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => ['required', 'integer', 'min:1']
        ];
    }
}
