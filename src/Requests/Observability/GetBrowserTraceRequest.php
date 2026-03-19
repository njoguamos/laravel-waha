<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetBrowserTraceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
        protected int $seconds = 30,
        protected string $categories = '*',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/server/debug/browser/trace/'.rawurlencode($this->session);
    }

    protected function defaultQuery(): array
    {
        return [
            'seconds'    => $this->seconds,
            'categories' => $this->categories,
        ];
    }
}
