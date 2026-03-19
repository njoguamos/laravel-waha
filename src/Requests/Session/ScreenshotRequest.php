<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ScreenshotRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session = 'default',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/screenshot';
    }

    protected function defaultQuery(): array
    {
        return [
            'session' => $this->session,
        ];
    }
}
