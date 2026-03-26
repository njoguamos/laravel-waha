<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ContactData;

class GetContactRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $contactId,
        protected ?string $session = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/contacts';
    }

    public function createDtoFromResponse(Response $response): ContactData
    {
        return ContactData::fromArray($response->json());
    }

    protected function defaultQuery(): array
    {
        return [
            'contactId' => $this->contactId,
            'session'   => $this->session ?? config(key: 'waha.session'),
        ];
    }
}
