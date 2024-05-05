<?php

namespace App\Modules\MoodDiary\Contracts;

use App\Modules\MoodDiary\Dto\CreateMoodBlogPostCommentDto;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostDto;
use App\Modules\MoodDiary\Dto\MoodBlogDto;
use App\Modules\MoodDiary\Dto\MoodBlogPostCommentDto;
use App\Modules\MoodDiary\Dto\MoodBlogPostDto;

interface MoodDiaryServiceContract
{
    public function createBlog(int $userId): MoodBlogDto;
    public function getBlogById(int $id): MoodBlogDto;
    public function getPostById(int $id): MoodBlogPostDto;
    public function getBlogByUsername(string $username): MoodBlogDto;
    /** @return MoodBlogPostDto[] */
    public function getPostsByBlogId(int $id): array;
    /** @return MoodBlogPostCommentDto[] */
    public function getCommentsByPostId(int $id): array;
    public function addPostToBlog(CreateMoodBlogPostDto $postDto): void;
    public function addCommentToPost(CreateMoodBlogPostCommentDto $commentDto): void;
}
