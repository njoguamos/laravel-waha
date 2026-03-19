<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\AppType;

class AppData
{
    /**
     * @param  array<string, mixed>  $config
     */
    public function __construct(
        public string $session,
        public AppType $app,
        public bool $enabled = true,
        public ?string $id = null,
        public array $config = [],
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'session' => $this->session,
            'app'     => $this->app->value,
            'enabled' => $this->enabled,
            'config'  => $this->config,
        ];

        if ($this->id !== null) {
            $array['id'] = $this->id;
        }

        return $array;
    }
}
