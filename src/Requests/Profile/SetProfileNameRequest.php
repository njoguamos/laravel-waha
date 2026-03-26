<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Profile;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class SetProfileNameRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $session,
        protected string $name,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/profile/name';
    }

    public function defaultBody(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
