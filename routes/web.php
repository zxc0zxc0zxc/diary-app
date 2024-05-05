<?php

use App\Modules\Authorization\Http\Controllers\AuthorizationController;
use App\Modules\MoodDiary\Http\Controllers\MoodDiaryViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/blog', [MoodDiaryViewController::class, 'viewBlog']);
Route::get('/post', [MoodDiaryViewController::class, 'viewPost']);
Route::post('/api/register', [AuthorizationController::class, 'register']);
Route::post('/api/login', [AuthorizationController::class, 'login']);
