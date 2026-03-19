<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use InvalidArgumentException;

class SessionWebhookData
{
    /**
     * @param  SessionWebhookCustomHeaderData[]|array|null  $customHeaders
     */
    public function __construct(
        public string $url,
        public array $events,
        public SessionWebhookHmacData|array|string|null $hmac = null,
        public SessionWebhookRetryData|array|int|null $retries = null,
        public ?array $customHeaders = null,
    ) {
        $this->hmac = $this->normalizeHmac($hmac);
        $this->retries = $this->normalizeRetries($retries);
        $this->customHeaders = $this->normalizeCustomHeaders($customHeaders);
    }

    public static function fromArray(array $data): self
    {
        if (isset($data['hmac'])) {
            if (! is_array($data['hmac']) || ! array_key_exists('key', $data['hmac'])) {
                throw new InvalidArgumentException('The [hmac] must be an array and contain [key].');
            }
        }

        if (isset($data['retries'])) {
            $required = ['policy', 'delaySeconds', 'attempts'];
            foreach ($required as $key) {
                if (! is_array($data['retries']) || ! array_key_exists($key, $data['retries'])) {
                    throw new InvalidArgumentException('The [retries] must be an array and contain [policy, delaySeconds, attempts].');
                }
            }
        }

        if (isset($data['customHeaders'])) {
            if (! is_array($data['customHeaders']) || (count($data['customHeaders']) > 0 && ! is_array($data['customHeaders'][0]))) {
                throw new InvalidArgumentException('The [customHeaders] must be an indexed array of associative arrays.');
            }

            foreach ($data['customHeaders'] as $header) {
                if (! is_array($header) || ! array_key_exists('name', $header) || ! array_key_exists('value', $header)) {
                    throw new InvalidArgumentException('Each item in [customHeaders] must be an array and contain [name, value].');
                }
            }
        }

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

    private function normalizeHmac(SessionWebhookHmacData|array|string|null $hmac): ?SessionWebhookHmacData
    {
        if ($hmac instanceof SessionWebhookHmacData || $hmac === null) {
            return $hmac;
        }

        if (is_string($hmac)) {
            return new SessionWebhookHmacData(key: $hmac);
        }

        return SessionWebhookHmacData::fromArray($hmac);
    }

    private function normalizeRetries(SessionWebhookRetryData|array|int|null $retries): ?SessionWebhookRetryData
    {
        if ($retries instanceof SessionWebhookRetryData || $retries === null) {
            return $retries;
        }

        if (is_int($retries)) {
            return new SessionWebhookRetryData(policy: 'constant', delaySeconds: 2, attempts: $retries);
        }

        return SessionWebhookRetryData::fromArray($retries);
    }

    private function normalizeCustomHeaders(?array $customHeaders): ?array
    {
        if ($customHeaders === null) {
            return null;
        }

        return array_map(static function ($header) {
            if ($header instanceof SessionWebhookCustomHeaderData) {
                return $header;
            }

            return SessionWebhookCustomHeaderData::fromArray($header);
        }, $customHeaders);
    }
}
