<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\SessionMeData;

class GetMeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/sessions/'.rawurlencode($this->session).'/me';
    }

    public function createDtoFromResponse(Response $response): SessionMeData
    {
        return SessionMeData::fromArray($response->json());
    }
}
