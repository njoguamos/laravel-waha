<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class LinkPreviewData
{
    public function __construct(
        public string $url,
        public string $title,
        public string $description,
    ) {
    }

    public function toArray(): array
    {
        return [
            'url'         => $this->url,
            'title'       => $this->title,
            'description' => $this->description,
        ];
    }
}
