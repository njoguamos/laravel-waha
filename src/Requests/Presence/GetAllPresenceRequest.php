<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Presence;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ChatPresenceData;

class GetAllPresenceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/presence';
    }

    /**
     * @return list<ChatPresenceData>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            callback: static fn (array $data): ChatPresenceData => ChatPresenceData::fromArray($data),
            array:    $response->json()
        );
    }
}
