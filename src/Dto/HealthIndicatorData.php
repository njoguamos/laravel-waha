<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\HealthIndicatorStatus;

class HealthIndicatorData
{
    public function __construct(
        public HealthIndicatorStatus $status,
        public ?string $path = null,
        public ?string $diskPath = null,
        public ?int $free = null,
        public ?int $threshold = null,
        public ?string $message = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            status:    HealthIndicatorStatus::from($data['status']),
            path:      $data['path'] ?? null,
            diskPath:  $data['diskPath'] ?? null,
            free:      $data['free'] ?? null,
            threshold: $data['threshold'] ?? null,
            message:   $data['message'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'status'    => $this->status->value,
            'path'      => $this->path,
            'diskPath'  => $this->diskPath,
            'free'      => $this->free,
            'threshold' => $this->threshold,
            'message'   => $this->message,
        ], fn ($value) => $value !== null);
    }
}
