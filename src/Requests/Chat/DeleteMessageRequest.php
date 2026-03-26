<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Chat;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteMessageRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected string $messageId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/chats/'.rawurlencode($this->chatId).'/messages/'.rawurlencode($this->messageId);
    }
}
