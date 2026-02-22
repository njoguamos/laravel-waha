<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ContactExistsData
{
    public function __construct(
        public bool $numberExists,
        public ?string $chatId = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            numberExists: (bool) ($data['numberExists'] ?? false),
            chatId: $data['chatId'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'numberExists' => $this->numberExists,
            'chatId'       => $this->chatId,
        ];
    }
}
