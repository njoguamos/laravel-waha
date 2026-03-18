<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Presence;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\PresenceData;

class SetPresenceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected PresenceData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/presence';
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
