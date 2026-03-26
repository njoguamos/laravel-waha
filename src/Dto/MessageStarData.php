<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageStarData
{
    public function __construct(
        public string $chatId,
        public string $messageId,
        public bool $star,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId'    => $this->chatId,
            'messageId' => $this->messageId,
            'star'      => $this->star,
        ];
    }
}
