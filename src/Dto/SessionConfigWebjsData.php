<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionConfigWebjsData
{
    public function __construct(
        public bool $tagsEventsOn = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            tagsEventsOn: $data['tagsEventsOn'] ?? false,
        );
    }

    public function toArray(): array
    {
        return [
            'tagsEventsOn' => $this->tagsEventsOn,
        ];
    }
}
