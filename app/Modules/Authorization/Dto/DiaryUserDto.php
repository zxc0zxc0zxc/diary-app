<?php

namespace App\Modules\Authorization\Dto;

readonly class DiaryUserDto
{
    public function __construct(
        public string $username,
        public string $passwordHash
    ) {}
}
