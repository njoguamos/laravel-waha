<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionWebhookData
{
    public function __construct(
        public string $url,
        public array $events,
        public ?string $hmac = null,
        public ?int $retries = null,
        public ?array $customHeaders = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'],
            events: $data['events'],
            hmac: $data['hmac'] ?? null,
            retries: $data['retries'] ?? null,
            customHeaders: $data['customHeaders'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'url'           => $this->url,
            'events'        => $this->events,
            'hmac'          => $this->hmac,
            'retries'       => $this->retries,
            'customHeaders' => $this->customHeaders,
        ];
    }
}
