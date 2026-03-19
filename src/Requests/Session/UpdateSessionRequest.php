<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Session;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Contracts\Body\HasBody;
use NjoguAmos\Waha\Dto\SessionData;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\SessionUpdateData;

class UpdateSessionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $session,
        protected SessionUpdateData $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/sessions/'.rawurlencode($this->session);
    }

    public function createDtoFromResponse(Response $response): SessionData
    {
        return SessionData::fromArray($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
