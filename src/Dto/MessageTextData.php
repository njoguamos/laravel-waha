<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageTextData
{
    public function __construct(
        public string $chatId,
        public string $text,
        public bool $linkPreview = true,
        public bool $linkPreviewHighQuality = true,
        public ?string $reply_to = null,
        public ?array $mentions = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId'                 => $this->chatId,
            'text'                   => $this->text,
            'linkPreview'            => $this->linkPreview,
            'linkPreviewHighQuality' => $this->linkPreviewHighQuality,
        ];

        if ($this->reply_to !== null) {
            $array['reply_to'] = $this->reply_to;
        }

        if ($this->mentions !== null) {
            $array['mentions'] = $this->mentions;
        }

        return $array;
    }
}
