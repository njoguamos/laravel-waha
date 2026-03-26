<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessagePollVoteData
{
    public function __construct(
        public string $chatId,
        public string $pollMessageId,
        public array $votes,
        public ?int $pollServerId = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId'        => $this->chatId,
            'pollMessageId' => $this->pollMessageId,
            'votes'         => $this->votes,
        ];

        if ($this->pollServerId !== null) {
            $array['pollServerId'] = $this->pollServerId;
        }

        return $array;
    }
}
