<?php

namespace App\Modules\Authorization\Dto;

readonly class LoginRequestDto
{
    public function __construct(
        public string $username,
        public string $password
    ) {}
}
