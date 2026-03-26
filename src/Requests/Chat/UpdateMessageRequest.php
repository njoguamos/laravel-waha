<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Chat;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\MessageUpdateData;

class UpdateMessageRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected string $messageId,
        protected MessageUpdateData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/chats/'.rawurlencode($this->chatId).'/messages/'.rawurlencode($this->messageId);
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
