<?php

namespace App\Modules\MoodDiary\Repositories;

use App\Models\Authorization\DiaryUser;
use App\Models\MoodDiary\MoodDiaryBlog;
use App\Models\MoodDiary\MoodDiaryComment;
use App\Models\MoodDiary\MoodDiaryPost;
use App\Modules\MoodDiary\Contracts\MoodDiaryRepositoryContract;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostCommentDto;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostDto;
use App\Modules\MoodDiary\Dto\MoodBlogDto;
use App\Modules\MoodDiary\Dto\MoodBlogPostCommentDto;
use App\Modules\MoodDiary\Dto\MoodBlogPostDto;

class MoodDiaryRepository implements MoodDiaryRepositoryContract
{

    public function createBlog(int $userId): MoodBlogDto
    {
        $blog = new MoodDiaryBlog;
        $blog->user_id = $userId;
        $blog->save();
        return new MoodBlogDto(
            id: $blog->id,
            userId: $blog->user_id
        );
    }

    public function getBlogById(int $id): MoodBlogDto
    {
        $blog = MoodDiaryBlog::find($id);
        return new MoodBlogDto(
            id: $blog->id,
            userId: $blog->user_id
        );
    }

    public function getBlogByUsername(string $username): MoodBlogDto
    {
        $user = DiaryUser::where('username', '=', $username)->first();
        $blog = MoodDiaryBlog::where('user_id', '=', $user->username)->first();
        return new MoodBlogDto(
            id: $blog->id,
            userId: $blog->user_id
        );
    }

    /** @return MoodBlogPostDto[] */
    public function getPostsByBlogId(int $id): array
    {
        return MoodDiaryPost::where('blog_id', '=', $id)
            ->get()
            ->map(function (MoodDiaryPost $post) {
                return new MoodBlogPostDto(
                    id: $post->id,
                    blogId: $post->blog_id,
                    username: $post->username,
                    date: $post->created_at,
                    header: $post->header,
                    content: $post->content
                );
            });
    }

    /** @return MoodBlogPostCommentDto[] */
    public function getCommentsByPostId(int $id): array
    {
        return MoodDiaryComment::where('post_id', '=', $id)
            ->get()
            ->map(function (MoodDiaryComment $comment) {
                return new MoodBlogPostCommentDto(
                    id: $comment->id,
                    postId: $comment->post_id,
                    username: $comment->username,
                    text: $comment->text
                );
            });
    }

    public function addPostToBlog(CreateMoodBlogPostDto $postDto): void
    {
        $post = new MoodDiaryPost;
        $post->blog_id = $postDto->blogId;
        $post->username = $postDto->username;
        $post->content = $postDto->content;
        $post->header = $postDto->header;
        $post->save();
    }

    public function addCommentToPost(CreateMoodBlogPostCommentDto $commentDto): void
    {
        $comment = new MoodDiaryComment;
        $comment->username = $commentDto->username;
        $comment->post_id = $commentDto->postId;
        $comment->text = $commentDto->text;
        $comment->save();
    }

    public function getPostById(int $id): MoodBlogPostDto
    {
        $post = MoodDiaryPost::find($id);
        return new MoodBlogPostDto(
            id: $post->id,
            blogId: $post->blog_id,
            username: $post->username,
            date: $post->created_at,
            header: $post->header,
            content: $post->content
        );
    }
}
