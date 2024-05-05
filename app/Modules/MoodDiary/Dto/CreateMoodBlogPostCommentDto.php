<?php

namespace App\Modules\MoodDiary\Dto;

readonly class CreateMoodBlogPostCommentDto
{
    public function __construct(
        public int $postId,
        public string $username,
        public string $text
    )
    {
    }
}
