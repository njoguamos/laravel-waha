<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\App;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListAppsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/apps';
    }

    protected function defaultQuery(): array
    {
        return [
            'session' => $this->session,
        ];
    }
}
