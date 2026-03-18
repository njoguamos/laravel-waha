<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionMeData
{
    public function __construct(
        public string $id,
        public string $pushName,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            pushName: $data['pushName'],
        );
    }

    public function toArray(): array
    {
        return [
            'id'       => $this->id,
            'pushName' => $this->pushName,
        ];
    }
}
