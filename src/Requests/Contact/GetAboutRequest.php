<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAboutRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $contactId,
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/contacts/about';
    }

    protected function defaultQuery(): array
    {
        return [
            'contactId' => $this->contactId,
            'session'   => $this->session,
        ];
    }
}
