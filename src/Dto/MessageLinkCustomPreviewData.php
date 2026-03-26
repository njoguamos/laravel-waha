<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageLinkCustomPreviewData
{
    public function __construct(
        public string $chatId,
        public string $text,
        public LinkPreviewData $preview,
        public ?string $replyTo = null,
        public bool $linkPreviewHighQuality = true,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId'                 => $this->chatId,
            'text'                   => $this->text,
            'preview'                => $this->preview->toArray(),
            'reply_to'               => $this->replyTo,
            'linkPreviewHighQuality' => $this->linkPreviewHighQuality,
        ];
    }
}
