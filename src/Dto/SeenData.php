<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SeenData
{
    public function __construct(
        public string $chatId,
        public ?array $messageIds = null,
        public ?string $participant = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId' => $this->chatId,
        ];

        if ($this->messageIds !== null) {
            $array['messageIds'] = $this->messageIds;
        }

        if ($this->participant !== null) {
            $array['participant'] = $this->participant;
        }

        return $array;
    }
}
