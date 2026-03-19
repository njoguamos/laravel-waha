<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionUpdateData
{
    /**
     * @param  array[]  $apps
     */
    public function __construct(
        public ?SessionConfigData $config = null,
        public ?array $apps = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [];

        if ($this->config !== null) {
            $array['config'] = $this->config->toArray();
        }

        if ($this->apps !== null) {
            $array['apps'] = $this->apps;
        }

        return $array;
    }
}
