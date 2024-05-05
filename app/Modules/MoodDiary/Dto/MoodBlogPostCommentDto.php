<?php

namespace App\Modules\MoodDiary\Dto;

readonly class MoodBlogPostCommentDto
{
    public function __construct(
        public int $id,
        public int $postId,
        public string $username,
        public string $text
    )
    {
    }
}
