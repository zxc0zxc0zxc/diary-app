<?php

namespace App\Modules\MoodDiary\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMoodDiaryBlogPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'blog_id' => ['required', 'integer', 'min:1'],
            'username' => ['required', 'string'],
            'header' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];
    }
}
