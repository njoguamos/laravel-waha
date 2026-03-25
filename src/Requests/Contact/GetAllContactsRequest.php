<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ContactData;

class GetAllContactsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $session = null,
        protected string $sortBy = 'name',
        protected string $sortOrder = 'desc',
        protected int $limit = 100,
        protected int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/contacts/all';
    }

    /**
     * @return list<ContactData>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            callback: static fn (array $data): ContactData => ContactData::fromArray($data),
            array:    $response->json()
        );
    }

    protected function defaultQuery(): array
    {
        return [
            'session'   => $this->session ?? config(key: 'waha.session'),
            'sortBy'    => $this->sortBy,
            'sortOrder' => $this->sortOrder,
            'limit'     => $this->limit,
            'offset'    => $this->offset,
        ];
    }
}
