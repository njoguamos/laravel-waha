<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ChatPresenceData
{
    public function __construct(
        public string $id,
        /** @var list<PresenceChatData> */
        public array $presences,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id:        $data['id'],
            presences: array_map(
                callback: static fn (array $item): PresenceChatData => PresenceChatData::fromArray($item),
                array:    $data['presences'] ?? [],
            ),
        );
    }

    public function toArray(): array
    {
        return [
            'id'        => $this->id,
            'presences' => array_map(
                callback: static fn (PresenceChatData $presence): array => $presence->toArray(),
                array:    $this->presences,
            ),
        ];
    }
}
