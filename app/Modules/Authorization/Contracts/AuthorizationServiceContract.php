<?php

namespace App\Modules\Authorization\Contracts;

use App\Modules\Authorization\Dto\LoginRequestDto;
use App\Modules\Authorization\Dto\RegisterRequestDto;

interface AuthorizationServiceContract
{
    public function register(RegisterRequestDto $registerDto): void;
    public function login(LoginRequestDto $loginDto): bool;
    public function getUserIdByUsername(string $username): int;
}
