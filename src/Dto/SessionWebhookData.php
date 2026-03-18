<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionWebhookData
{
    /**
     * @param  SessionWebhookCustomHeaderData[]|null  $customHeaders
     */
    public function __construct(
        public string $url,
        public array $events,
        public ?SessionWebhookHmacData $hmac = null,
        public ?SessionWebhookRetryData $retries = null,
        public ?array $customHeaders = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'],
            events: $data['events'],
            hmac: isset($data['hmac']) ? SessionWebhookHmacData::fromArray($data['hmac']) : null,
            retries: isset($data['retries']) ? SessionWebhookRetryData::fromArray($data['retries']) : null,
            customHeaders: isset($data['customHeaders']) ? array_map(static fn (array $header) => SessionWebhookCustomHeaderData::fromArray($header), $data['customHeaders']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'url'           => $this->url,
            'events'        => $this->events,
            'hmac'          => $this->hmac?->toArray(),
            'retries'       => $this->retries?->toArray(),
            'customHeaders' => isset($this->customHeaders) ? array_map(static fn (SessionWebhookCustomHeaderData $header) => $header->toArray(), $this->customHeaders) : null,
        ];
    }
}
