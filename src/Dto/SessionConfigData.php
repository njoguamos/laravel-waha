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
        public ?SessionConfigNowebData $noweb = null,
        public ?SessionConfigWebjsData $webjs = null,
        public ?SessionConfigGowsData $gows = null,
        public ?SessionConfigClientData $client = null,
        public ?SessionConfigIgnoreData $ignore = null,
        public array $metadata = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            proxy: ! empty($data['proxy']) ? SessionProxyData::fromArray($data['proxy']) : null,
            webhooks: array_map(static fn (array $webhook) => SessionWebhookData::fromArray($webhook), $data['webhooks'] ?? []),
            debug: $data['debug'] ?? false,
            noweb: ! empty($data['noweb']) ? SessionConfigNowebData::fromArray($data['noweb']) : null,
            webjs: ! empty($data['webjs']) ? SessionConfigWebjsData::fromArray($data['webjs']) : null,
            gows: ! empty($data['gows']) ? SessionConfigGowsData::fromArray($data['gows']) : null,
            client: ! empty($data['client']) ? SessionConfigClientData::fromArray($data['client']) : null,
            ignore: ! empty($data['ignore']) ? SessionConfigIgnoreData::fromArray($data['ignore']) : null,
            metadata: $data['metadata'] ?? [],
        );
    }

    public function toArray(): array
    {
        $array = [
            'webhooks' => array_map(static fn (SessionWebhookData $webhook) => $webhook->toArray(), $this->webhooks),
            'debug'    => $this->debug,
            'metadata' => $this->metadata,
        ];

        if ($this->proxy !== null) {
            $array['proxy'] = $this->proxy->toArray();
        }

        if ($this->noweb !== null) {
            $array['noweb'] = $this->noweb->toArray();
        }

        if ($this->webjs !== null) {
            $array['webjs'] = $this->webjs->toArray();
        }

        if ($this->gows !== null) {
            $array['gows'] = $this->gows->toArray();
        }

        if ($this->client !== null) {
            $array['client'] = $this->client->toArray();
        }

        if ($this->ignore !== null) {
            $array['ignore'] = $this->ignore->toArray();
        }

        return $array;
    }
}
