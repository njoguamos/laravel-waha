<?php

declare(strict_types=1);

namespace NjoguAmos\Waha;

use Saloon\Http\Connector;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class WahaConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        protected string $baseUrl,
        protected string $apiKey,
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultAuth(): HeaderAuthenticator
    {
        return new HeaderAuthenticator(
            accessToken: $this->apiKey,
            headerName: 'X-API-Key'
        );
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }
}
