<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageUpdateData
{
    public function __construct(
        public string $text,
        public bool $linkPreview = true,
        public bool $linkPreviewHighQuality = false,
    ) {
    }

    public function toArray(): array
    {
        return [
            'text'                   => $this->text,
            'linkPreview'            => $this->linkPreview,
            'linkPreviewHighQuality' => $this->linkPreviewHighQuality,
        ];
    }
}
