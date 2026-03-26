<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Message;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use NjoguAmos\Waha\Dto\ChatData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class StartTypingRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected ChatData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/startTyping';
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
