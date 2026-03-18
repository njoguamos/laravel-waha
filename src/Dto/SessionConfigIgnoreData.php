<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionConfigIgnoreData
{
    public function __construct(
        public bool $status = false,
        public bool $groups = false,
        public bool $channels = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'] ?? false,
            groups: $data['groups'] ?? false,
            channels: $data['channels'] ?? false,
        );
    }

    public function toArray(): array
    {
        return [
            'status'   => $this->status,
            'groups'   => $this->groups,
            'channels' => $this->channels,
        ];
    }
}
