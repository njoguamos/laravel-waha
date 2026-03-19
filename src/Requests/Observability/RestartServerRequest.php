<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class RestartServerRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected bool $force = false,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/server/stop';
    }

    public function defaultBody(): array
    {
        return [
            'force' => $this->force,
        ];
    }
}
