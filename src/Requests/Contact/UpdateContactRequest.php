<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\ContactUpdateData;

class UpdateContactRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $chatId,
        protected ContactUpdateData $data,
        protected ?string $session = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session ?? config(key: 'waha.session')).'/contacts/'.rawurlencode($this->chatId);
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
