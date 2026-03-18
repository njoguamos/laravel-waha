<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionData
{
    public function __construct(
        public string $name,
        public string $status,
        public ?SessionConfigData $config = null,
        public ?SessionMeData $me = null,
        public ?SessionEngineData $engine = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            status: $data['status'],
            config: isset($data['config']) ? SessionConfigData::fromArray($data['config']) : null,
            me: isset($data['me']) ? SessionMeData::fromArray($data['me']) : null,
            engine: isset($data['engine']) ? SessionEngineData::fromArray($data['engine']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'name'   => $this->name,
            'status' => $this->status,
            'config' => $this->config?->toArray(),
            'me'     => $this->me?->toArray(),
            'engine' => $this->engine?->toArray(),
        ];
    }
}
