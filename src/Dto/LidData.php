<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use InvalidArgumentException;

class LidData
{
    public function __construct(
        public ?string $lid,
        public string $pn,
    ) {
    }

    public static function fromArray(array $data): self
    {
        if (! array_key_exists(key: 'pn', array: $data) || ! is_string(value: $data['pn']) || $data['pn'] === '') {
            throw new InvalidArgumentException(message: "The 'pn' key is required and must be a non-empty string.");
        }

        return new self(
            lid: $data['lid'] ?? null,
            pn:  $data['pn'],
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
