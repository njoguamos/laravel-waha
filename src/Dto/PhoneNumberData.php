<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class PhoneNumberData
{
    public function __construct(
        public string $lid,
        public ?string $pn,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            lid: $data['lid'],
            pn:  $data['pn'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'lid' => $this->lid,
            'pn'  => $this->pn,
        ];
    }
}
