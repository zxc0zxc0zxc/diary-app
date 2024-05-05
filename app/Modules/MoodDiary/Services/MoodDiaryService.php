<?php

namespace App\Modules\MoodDiary\Services;

use App\Modules\MoodDiary\Contracts\MoodDiaryRepositoryContract;
use App\Modules\MoodDiary\Contracts\MoodDiaryServiceContract;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostCommentDto;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostDto;
use App\Modules\MoodDiary\Dto\MoodBlogDto;
use App\Modules\MoodDiary\Dto\MoodBlogPostDto;

class MoodDiaryService implements MoodDiaryServiceContract
{
    public function __construct(
        private MoodDiaryRepositoryContract $repository
    )
    {

    }


    public function createBlog(int $userId): MoodBlogDto
    {
        return $this->repository->createBlog($userId);
    }

    public function getBlogById(int $id): MoodBlogDto
    {
        return $this->repository->getBlogById($id);
    }

    public function getBlogByUsername(string $username): MoodBlogDto
    {
        return $this->repository->getBlogByUsername($username);
    }

    public function getPostsByBlogId(int $id): array
    {
        return $this->repository->getPostsByBlogId($id);
    }

    public function getCommentsByPostId(int $id): array
    {
        return $this->repository->getCommentsByPostId($id);
    }

    public function addPostToBlog(CreateMoodBlogPostDto $postDto): void
    {
        $this->repository->addPostToBlog($postDto);
    }

    public function addCommentToPost(CreateMoodBlogPostCommentDto $commentDto): void
    {
        $this->repository->addCommentToPost($commentDto);
    }

    public function getPostById(int $id): MoodBlogPostDto
    {
        return $this->repository->getPostById($id);
    }
}
