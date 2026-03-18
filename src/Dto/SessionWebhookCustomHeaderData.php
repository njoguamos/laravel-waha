<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionWebhookCustomHeaderData
{
    public function __construct(
        public string $name,
        public string $value,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            value: $data['value'],
        );
    }

    public function toArray(): array
    {
        return [
            'name'  => $this->name,
            'value' => $this->value,
        ];
    }
}
