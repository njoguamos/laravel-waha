<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Chat;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\ChatRequestData;

class StopTypingRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected ChatRequestData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/stopTyping';
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
