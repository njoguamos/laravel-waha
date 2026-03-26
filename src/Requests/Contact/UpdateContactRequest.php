<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use InvalidArgumentException;
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
        $this->chatId = mb_trim($this->chatId);
        $this->session = $this->session !== null ? mb_trim($this->session) : null;

        if ($this->session === '' || $this->session === null) {
            $this->session = config(key: 'waha.session');
        }

        if ($this->chatId === '') {
            throw new InvalidArgumentException(message: 'Chat ID cannot be empty.');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/contacts/'.rawurlencode($this->chatId);
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
