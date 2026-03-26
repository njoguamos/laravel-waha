<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessagePollData
{
    public function __construct(
        public string $chatId,
        public PollData $poll,
        public ?string $reply_to = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId' => $this->chatId,
            'poll'   => $this->poll->toArray(),
        ];

        if ($this->reply_to !== null) {
            $array['reply_to'] = $this->reply_to;
        }

        return $array;
    }
}
