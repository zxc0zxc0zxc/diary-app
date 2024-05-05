<?php

namespace App\Modules\Authorization\Dto;

readonly class RegisterRequestDto
{
    public function __construct(
        public string $username,
        public string $password,
        public string $password_repeat
    ) {}
}
