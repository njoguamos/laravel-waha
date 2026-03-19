<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\SessionStatus;

class SessionData
{
    public function __construct(
        public string $name,
        public SessionStatus $status,
        public ?SessionConfigData $config = null,
        public ?SessionMeData $me = null,
        public ?SessionEngineData $engine = null,
        public array $apps = [],
        public ?string $assignedWorker = null,
        public ?array $presence = null,
        public ?array $timestamps = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            status: SessionStatus::from($data['status']),
            config: isset($data['config']) ? SessionConfigData::fromArray($data['config']) : null,
            me: isset($data['me']) ? SessionMeData::fromArray($data['me']) : null,
            engine: isset($data['engine']) ? SessionEngineData::fromArray($data['engine']) : null,
            apps: $data['apps'] ?? [],
            assignedWorker: $data['assignedWorker'] ?? null,
            presence: $data['presence'] ?? null,
            timestamps: $data['timestamps'] ?? null,
        );
    }

    public function toArray(): array
    {
        $array = [
            'name'           => $this->name,
            'status'         => $this->status->value,
            'config'         => $this->config?->toArray(),
            'me'             => $this->me?->toArray(),
            'engine'         => $this->engine?->toArray(),
        ];

        if (count($this->apps) > 0) {
            $array['apps'] = $this->apps;
        }

        if ($this->assignedWorker !== null) {
            $array['assignedWorker'] = $this->assignedWorker;
        }

        if ($this->presence !== null) {
            $array['presence'] = $this->presence;
        }

        if ($this->timestamps !== null) {
            $array['timestamps'] = $this->timestamps;
        }

        return $array;
    }
}
