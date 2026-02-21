<?php

declare(strict_types=1);

namespace NjoguAmos\Waha;

use Saloon\Http\Connector;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class WahaConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        protected string $baseUrl,
        protected string $apiKey,
        protected array $customHeaders = []
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator(token: $this->apiKey);
    }

    protected function defaultHeaders(): array
    {
        return array_merge(
            [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ],
            $this->customHeaders
        );
    }
}
