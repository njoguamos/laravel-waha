<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use InvalidArgumentException;

class PhoneNumberData
{
    public function __construct(
        public string $lid,
        public ?string $pn,
    ) {
    }

    public static function fromArray(array $data): self
    {
        if (! array_key_exists(key: 'lid', array: $data) || ! is_string(value: $data['lid']) || $data['lid'] === '') {
            throw new InvalidArgumentException(message: "The 'lid' key is required and must be a non-empty string.");
        }

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
