<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionWebhookHmacData
{
    public function __construct(
        public string $key,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            key: $data['key'],
        );
    }

    public function toArray(): array
    {
        return [
            'key' => $this->key,
        ];
    }
}
