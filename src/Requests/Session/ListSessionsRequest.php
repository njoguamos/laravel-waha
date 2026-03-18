<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\SessionData;

class ListSessionsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private bool $all = true,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/sessions';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            static fn (array $data) => SessionData::fromArray($data),
            $response->json()
        );
    }

    protected function defaultQuery(): array
    {
        return $this->all ? ['all' => 'true'] : [];
    }
}
