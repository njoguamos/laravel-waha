<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\Presence;

class PresenceData
{
    public function __construct(
        public Presence $presence,
        public ?string $chatId = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'presence' => $this->presence->value,
        ];

        if ($this->chatId !== null) {
            $array['chatId'] = $this->chatId;
        }

        return $array;
    }
}
