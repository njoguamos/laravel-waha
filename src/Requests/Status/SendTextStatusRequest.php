<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Status;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\TextStatusData;

class SendTextStatusRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected TextStatusData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/text";
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): TextStatusData
    {
        return TextStatusData::fromArray($response->json());
    }
}
