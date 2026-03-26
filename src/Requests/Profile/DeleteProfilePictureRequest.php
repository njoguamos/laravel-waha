<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Profile;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteProfilePictureRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/profile/picture';
    }
}
