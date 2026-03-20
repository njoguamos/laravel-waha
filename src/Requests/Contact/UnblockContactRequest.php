<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class UnblockContactRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $contactId,
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/contacts/unblock';
    }

    protected function defaultBody(): array
    {
        return [
            'contactId' => $this->contactId,
            'session'   => $this->session,
        ];
    }
}
