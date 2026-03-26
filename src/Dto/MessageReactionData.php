<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageReactionData
{
    public function __construct(
        public string $chatId,
        public string $messageId,
        public ?string $reaction,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId'    => $this->chatId,
            'messageId' => $this->messageId,
            'reaction'  => $this->reaction,
        ];
    }
}
