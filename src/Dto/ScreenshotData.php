<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ScreenshotData
{
    public function __construct(
        public string $mimetype,
        public string $data,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            mimetype: $data['mimetype'],
            data: $data['data'],
        );
    }

    public function toArray(): array
    {
        return [
            'mimetype' => $this->mimetype,
            'data'     => $this->data,
        ];
    }
}
