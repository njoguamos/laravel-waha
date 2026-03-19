<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\LidData;

class GetAllLidsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
        protected int $limit = 100,
        protected int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/lids';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            callback: static fn (array $data): LidData => LidData::fromArray($data),
            array:    $response->json()
        );
    }

    protected function defaultQuery(): array
    {
        return [
            'limit'  => $this->limit,
            'offset' => $this->offset,
        ];
    }
}
