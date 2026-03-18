<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class StopSessionRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/api/sessions/{$this->session}/stop";
    }
}
