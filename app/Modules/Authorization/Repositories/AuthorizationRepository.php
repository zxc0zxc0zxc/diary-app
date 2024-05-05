<?php

namespace App\Modules\Authorization\Repositories;

use App\Models\Authorization\DiaryUser;
use App\Modules\Authorization\Contracts\AuthorizationRepositoryContract;
use App\Modules\Authorization\Dto\LoginRequestDto;
use App\Modules\Authorization\Dto\RegisterRequestDto;
use App\Modules\Authorization\Exceptions\PasswordsDontMatchException;

class AuthorizationRepository implements AuthorizationRepositoryContract
{

    public function register(RegisterRequestDto $registerDto): void
    {
        if($registerDto->password !== $registerDto->password_repeat) {
            throw new PasswordsDontMatchException();
        }
        $user = new DiaryUser;
        $user->username = $registerDto->username;
        $user->password_hash = md5($registerDto->password);
        $user->save();
    }

    public function login(LoginRequestDto $loginDto): bool
    {
        $user = DiaryUser::where('username', '=', $loginDto->username)->first();
        return ($user && $user->password_hash === md5($loginDto->password));
    }

    public function getUserIdByUsername(string $username): int
    {
        $user = DiaryUser::where('username', '=', $username)->first();
        return $user->id;
    }
}
