<?php

namespace App\Modules\MoodDiary\Dto;

readonly class MoodBlogDto
{
    public function __construct(
        public int $id,
        public int $userId
    )
    {

    }
}
