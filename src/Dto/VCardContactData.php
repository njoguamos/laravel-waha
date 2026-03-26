<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class VCardContactData
{
    public function __construct(
        public string $vcard,
    ) {
    }

    public function toArray(): array
    {
        return [
            'vcard' => $this->vcard,
        ];
    }
}
