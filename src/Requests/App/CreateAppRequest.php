<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\App;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use NjoguAmos\Waha\Dto\AppData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class CreateAppRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected AppData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/apps';
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
