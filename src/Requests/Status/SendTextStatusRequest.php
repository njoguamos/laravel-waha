<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Status;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\TextStatusData;

class SendTextStatusRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected TextStatusData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/text";
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
