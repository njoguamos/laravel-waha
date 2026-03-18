<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\SessionData;

class GetSessionRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/sessions/'.rawurlencode($this->session);
    }

    public function createDtoFromResponse(Response $response): SessionData
    {
        return SessionData::fromArray($response->json());
    }
}
