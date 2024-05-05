<?php

namespace App\Modules\MoodDiary\Dto;

readonly class CreateMoodBlogPostDto
{
    public function __construct(
       public int $blogId,
       public string $username,
       public string $header,
       public string $content
    ) {}
}
