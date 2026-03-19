<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\App;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteAppRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected string $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/apps/'.rawurlencode($this->id);
    }
}
