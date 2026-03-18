<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListSessionsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected bool $all = true,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/sessions';
    }

    protected function defaultQuery(): array
    {
        return $this->all ? ['all' => 'true'] : [];
    }
}
