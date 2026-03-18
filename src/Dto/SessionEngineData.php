<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\Engine;

class SessionEngineData
{
    public function __construct(
        public Engine $engine,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            engine: Engine::from($data['engine']),
        );
    }

    public function toArray(): array
    {
        return [
            'engine' => $this->engine->value,
        ];
    }
}
