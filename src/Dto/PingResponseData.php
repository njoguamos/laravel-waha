<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class PingResponseData
{
    public function __construct(
        public string $message = 'pong',
    ) {
    }

    public function toArray(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}
