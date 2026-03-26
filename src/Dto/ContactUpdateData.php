<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ContactUpdateData
{
    public function __construct(
        public string $firstName,
        public string $lastName,
    ) {
    }

    public function toArray(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName'  => $this->lastName,
        ];
    }
}
