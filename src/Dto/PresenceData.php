<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use InvalidArgumentException;
use NjoguAmos\Waha\Enums\Presence;

class PresenceData
{
    public function __construct(
        public Presence $presence,
        public ?string $chatId = null,
    ) {
        if (in_array($this->presence, [Presence::TYPING, Presence::RECORDING, Presence::PAUSED], true) && $this->chatId === null) {
            throw new InvalidArgumentException(message: "The chatId is required when presence is set to {$this->presence->value}.");
        }
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
