<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\HealthStatus;

class HealthCheckData
{
    /**
     * @param array<string, HealthIndicatorData> $info
     * @param array<string, HealthIndicatorData> $error
     * @param array<string, HealthIndicatorData> $details
     */
    public function __construct(
        public HealthStatus $status,
        public array $info = [],
        public array $error = [],
        public array $details = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        $info = [];
        foreach ($data['info'] ?? [] as $key => $value) {
            $info[$key] = HealthIndicatorData::fromArray($value);
        }

        $error = [];
        foreach ($data['error'] ?? [] as $key => $value) {
            $error[$key] = HealthIndicatorData::fromArray($value);
        }

        $details = [];
        foreach ($data['details'] ?? [] as $key => $value) {
            $details[$key] = HealthIndicatorData::fromArray($value);
        }

        return new self(
            status:  HealthStatus::from($data['status']),
            info:    $info,
            error:   $error,
            details: $details,
        );
    }

    public function toArray(): array
    {
        return [
            'status'  => $this->status->value,
            'info'    => array_map(fn (HealthIndicatorData $indicator) => $indicator->toArray(), $this->info),
            'error'   => array_map(fn (HealthIndicatorData $indicator) => $indicator->toArray(), $this->error),
            'details' => array_map(fn (HealthIndicatorData $indicator) => $indicator->toArray(), $this->details),
        ];
    }
}
