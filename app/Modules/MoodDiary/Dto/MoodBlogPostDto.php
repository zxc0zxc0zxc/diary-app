<?php

namespace App\Modules\MoodDiary\Dto;

readonly class MoodBlogPostDto
{
    public function __construct(
       public int $id,
       public int $blogId,
       public string $username,
       public string $date,
       public string $header,
       public string $content
    ) {}
}
