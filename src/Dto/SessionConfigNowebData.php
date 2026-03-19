<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionConfigNowebData
{
    public function __construct(
        public bool $enabled = true,
        public bool $fullSync = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            enabled: $data['store']['enabled'] ?? true,
            fullSync: $data['store']['fullSync'] ?? false,
        );
    }

    public function toArray(): array
    {
        return [
            'store' => [
                'enabled'  => $this->enabled,
                'fullSync' => $this->fullSync,
            ],
        ];
    }
}
