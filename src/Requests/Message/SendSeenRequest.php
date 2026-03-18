<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Message;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use NjoguAmos\Waha\Dto\SeenData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class SendSeenRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected SeenData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/sendSeen";
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
