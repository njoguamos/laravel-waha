<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Presence;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SubscribePresenceRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected string $chatId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/presence/'.rawurlencode($this->chatId).'/subscribe';
    }
}
