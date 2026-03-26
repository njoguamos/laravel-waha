<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class PresenceChatData
{
    public function __construct(
        public string $participant,
        public string $lastKnownPresence,
        public ?int $lastSeen,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            participant:        $data['participant'],
            lastKnownPresence: $data['lastKnownPresence'],
            lastSeen:           $data['lastSeen'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'participant'       => $this->participant,
            'lastKnownPresence' => $this->lastKnownPresence,
            'lastSeen'          => $this->lastSeen,
        ];
    }
}
