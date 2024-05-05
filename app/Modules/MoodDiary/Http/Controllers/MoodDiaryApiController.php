<?php

namespace App\Modules\MoodDiary\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\MoodDiary\Contracts\MoodDiaryServiceContract;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostCommentDto;
use App\Modules\MoodDiary\Dto\CreateMoodBlogPostDto;
use App\Modules\MoodDiary\Dto\MoodBlogPostCommentDto;
use App\Modules\MoodDiary\Http\Requests\CreateMoodDiaryBlogCommentRequest;
use App\Modules\MoodDiary\Http\Requests\CreateMoodDiaryBlogPostRequest;
use http\Env\Request;

class MoodDiaryApiController extends Controller
{
    public function __construct(
        private MoodDiaryServiceContract $service
    ) {}
    public function createBlog() {
        $this->service->createBlog();
    }
    public function addCommentToPost(CreateMoodDiaryBlogCommentRequest $request) {
        $validated = $request->validated();
        $this->service->addCommentToPost(
            new CreateMoodBlogPostCommentDto(
                postId: $validated['post_id'],
                username: $validated['username'],
                text: $validated['text'],
            )
        );
    }

    public function addPostToBlog(CreateMoodDiaryBlogPostRequest $request) {
        $validated = $request->validated();
        $this->service->addPostToBlog(
            new CreateMoodBlogPostDto(
                blogId: $validated['blog_id'],
                username: $validated['username'],
                header: $validated['header'],
                content: $validated['content'],
            )
        );
    }
}
