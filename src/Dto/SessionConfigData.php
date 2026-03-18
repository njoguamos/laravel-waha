<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionConfigData
{
    /**
     * @param  SessionWebhookData[]  $webhooks
     */
    public function __construct(
        public ?SessionProxyData $proxy = null,
        public array $webhooks = [],
        public bool $debug = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            proxy: isset($data['proxy']) ? SessionProxyData::fromArray($data['proxy']) : null,
            webhooks: array_map(static fn (array $webhook) => SessionWebhookData::fromArray($webhook), $data['webhooks'] ?? []),
            debug: $data['debug'] ?? false,
        );
    }

    public function toArray(): array
    {
        return [
            'proxy'    => $this->proxy?->toArray(),
            'webhooks' => array_map(static fn (SessionWebhookData $webhook) => $webhook->toArray(), $this->webhooks),
            'debug'    => $this->debug,
        ];
    }
}
