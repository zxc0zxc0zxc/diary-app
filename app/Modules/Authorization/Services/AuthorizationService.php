<?php

namespace App\Modules\Authorization\Services;

use App\Modules\Authorization\Contracts\AuthorizationRepositoryContract;
use App\Modules\Authorization\Contracts\AuthorizationServiceContract;
use App\Modules\Authorization\Dto\LoginRequestDto;
use App\Modules\Authorization\Dto\RegisterRequestDto;

class AuthorizationService implements AuthorizationServiceContract
{
    public function __construct(
        private AuthorizationRepositoryContract $repository
    ) {}
    public function register(RegisterRequestDto $registerDto): void
    {
        $this->repository->register($registerDto);
    }

    public function login(LoginRequestDto $loginDto): bool
    {
        return $this->repository->login($loginDto);
    }

    public function getUserIdByUsername(string $username): int
    {
        return $this->repository->getUserIdByUsername($username);
    }
}
