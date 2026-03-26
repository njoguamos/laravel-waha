<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ChatData
{
    public function __construct(
        public string $chatId,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId' => $this->chatId,
        ];
    }
}
