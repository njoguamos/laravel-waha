<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetProfilePictureRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $contactId,
        protected bool $refresh,
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/contacts/profile-picture';
    }

    protected function defaultQuery(): array
    {
        return [
            'contactId' => $this->contactId,
            'refresh'   => $this->refresh ? 'True' : 'False',
            'session'   => $this->session,
        ];
    }
}
