<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\App;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use NjoguAmos\Waha\Dto\AppData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class UpdateAppRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $id,
        protected AppData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/apps/'.rawurlencode($this->id);
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
