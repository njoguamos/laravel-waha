<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\LidData;

class GetLidRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $phone,
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/lids/pn/'.rawurlencode($this->phone);
    }

    public function createDtoFromResponse(Response $response): LidData
    {
        return LidData::fromArray($response->json());
    }
}
