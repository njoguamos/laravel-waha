<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageButtonReplyData
{
    public function __construct(
        public string $chatId,
        public string $selectedDisplayText,
        public string $selectedButtonID,
        public ?string $replyTo = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId'              => $this->chatId,
            'selectedDisplayText' => $this->selectedDisplayText,
            'selectedButtonID'    => $this->selectedButtonID,
            'replyTo'             => $this->replyTo,
        ];
    }
}
