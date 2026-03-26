<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Presence;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ChatPresenceData;

class GetChatPresenceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/presence/'.rawurlencode($this->chatId);
    }

    public function createDtoFromResponse(Response $response): ChatPresenceData
    {
        return ChatPresenceData::fromArray($response->json());
    }
}
