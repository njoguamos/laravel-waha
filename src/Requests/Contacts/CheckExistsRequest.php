<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contacts;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ContactExistsData;

class CheckExistsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $phone,
        protected ?string $session = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/contacts/check-exists';
    }

    /** @throws JsonException */
    public function createDtoFromResponse(Response $response): ContactExistsData
    {
        return ContactExistsData::fromArray($response->json());
    }

    protected function defaultQuery(): array
    {
        return [
            'phone'   => $this->phone,
            'session' => $this->session ?? config(key: 'waha.session'),
        ];
    }
}
