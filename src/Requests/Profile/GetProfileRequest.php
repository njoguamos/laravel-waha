<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Profile;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ProfileData;

class GetProfileRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/profile';
    }

    public function createDtoFromResponse(Response $response): ProfileData
    {
        return ProfileData::fromArray($response->json());
    }
}
