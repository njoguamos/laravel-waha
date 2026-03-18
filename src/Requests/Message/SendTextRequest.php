<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Message;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\MessageTextData;

class SendTextRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected MessageTextData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/sendText";
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
