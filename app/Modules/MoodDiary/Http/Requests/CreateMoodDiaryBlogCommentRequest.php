<?php

namespace App\Modules\MoodDiary\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMoodDiaryBlogCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => ['required', 'integer', 'min:1'],
            'username' => ['required', 'string'],
            'text' => ['required', 'string']
        ];
    }
}
