<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Status;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\ImageStatusData;

class SendImageStatusRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected ImageStatusData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/image";
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
