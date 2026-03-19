<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;

class ServerVersionData
{
    public function __construct(
        public string $version,
        public Engine $engine,
        public Version $tier,
        public ?string $browser = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'version' => $this->version,
            'engine'  => $this->engine->value,
            'tier'    => $this->tier->value,
            'browser' => $this->browser,
        ];
    }
}
