<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Message;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\MessageContactVcardData;

class SendContactVcardRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected MessageContactVcardData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/sendContactVcard';
    }

    protected function defaultBody(): array
    {
        return [
            'session' => $this->session,
            ...$this->data->toArray(),
        ];
    }
}
