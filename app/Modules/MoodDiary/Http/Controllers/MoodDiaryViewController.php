<?php

namespace App\Modules\MoodDiary\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\MoodDiary\Contracts\MoodDiaryServiceContract;
use App\Modules\MoodDiary\Http\Requests\ViewBlogRequest;
use App\Modules\MoodDiary\Http\Requests\ViewPostRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\View;

class MoodDiaryViewController extends Controller
{
    public function __construct(
        private MoodDiaryServiceContract $service
    )
    {
    }

    public function viewPost(ViewPostRequest $request)
    {
        $post = $this->service->getPostById(
            $request->validated()['id']
        );
        $comments = $this->service->getCommentsByPostId(
            $post->id
        );
        return view('viewPost', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function viewBlog(ViewBlogRequest $request) {
        $blog = $this->service->getBlogById(
            $request->validated()['id']
        );
        $posts = $this->service->getPostsByBlogId(
            $blog->id
        );
        return view('viewBlog', [
            'blog' => $blog,
            'posts' => $posts
        ]);
    }
}
