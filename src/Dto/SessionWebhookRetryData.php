<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionWebhookRetryData
{
    public function __construct(
        public string $policy,
        public int $delaySeconds,
        public int $attempts,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            policy: $data['policy'],
            delaySeconds: $data['delaySeconds'],
            attempts: $data['attempts'],
        );
    }

    public function toArray(): array
    {
        return [
            'policy'       => $this->policy,
            'delaySeconds' => $this->delaySeconds,
            'attempts'     => $this->attempts,
        ];
    }
}
