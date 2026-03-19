<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionMeData
{
    public function __construct(
        public string $id,
        public string $pushName,
        public ?string $lid = null,
        public ?string $jid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            pushName: $data['pushName'],
            lid: $data['lid'] ?? null,
            jid: $data['jid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id'       => $this->id,
            'pushName' => $this->pushName,
            'lid'      => $this->lid,
            'jid'      => $this->jid,
        ]);
    }
}
