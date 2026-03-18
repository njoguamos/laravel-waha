<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionConfigClientData
{
    public function __construct(
        public ?string $deviceName = null,
        public ?string $browserName = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            deviceName: $data['deviceName'] ?? null,
            browserName: $data['browserName'] ?? null,
        );
    }

    public function toArray(): array
    {
        $array = [];

        if ($this->deviceName !== null) {
            $array['deviceName'] = $this->deviceName;
        }

        if ($this->browserName !== null) {
            $array['browserName'] = $this->browserName;
        }

        return $array;
    }
}
