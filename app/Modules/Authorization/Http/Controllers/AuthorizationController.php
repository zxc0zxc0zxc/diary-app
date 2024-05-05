<?php

namespace App\Modules\Authorization\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Authorization\Contracts\AuthorizationServiceContract;
use App\Modules\Authorization\Dto\LoginRequestDto;
use App\Modules\Authorization\Dto\RegisterRequestDto;
use App\Modules\Authorization\Http\Requests\LoginRequest;
use App\Modules\Authorization\Http\Requests\RegisterRequest;
use App\Modules\MoodDiary\Contracts\MoodDiaryServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AuthorizationController extends Controller
{
    public function __construct(
        private AuthorizationServiceContract $authService,
        private MoodDiaryServiceContract $diaryService
    ) {}

    public function register(RegisterRequest $request): void {
        $validated = $request->validated();
        $this->authService->register(new RegisterRequestDto(
            username: $validated['username'],
            password: $validated['password'],
            password_repeat: $validated['password_repeat']
        ));
    }

    public function login(LoginRequest $request): RedirectResponse {
        $validated = $request->validated();
        $login = $this->authService->login(
            new LoginRequestDto(
                username: $validated['username'],
                password: $validated['password']
            )
        );
        if(!$login) {
            return Redirect::to('/');
        }
        $blog = $this->diaryService->getBlogByUsername($validated['username']);
        return Redirect::to('/view?id=' . $blog->id);
    }
}
