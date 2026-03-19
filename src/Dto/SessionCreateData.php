<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionCreateData
{
    /**
     * @param  array[]  $apps
     */
    public function __construct(
        public string $name,
        public bool $start = true,
        public ?SessionConfigData $config = null,
        public ?array $apps = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'name'  => $this->name,
            'start' => $this->start,
        ];

        if ($this->config !== null) {
            $array['config'] = $this->config->toArray();
        }

        if ($this->apps !== null) {
            $array['apps'] = $this->apps;
        }

        return $array;
    }
}
