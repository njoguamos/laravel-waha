<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\PhoneNumberData;

class GetPhoneNumberRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string|int $lid,
        protected string $session,
    ) {
    }

    public function resolveEndpoint(): string
    {
        $lid = (string) $this->lid;

        if (str_contains($lid, '@')) {
            $lid = str_replace('@', '%40', $lid);
        }

        return '/api/'.$this->session.'/lids/'.$lid;
    }

    public function createDtoFromResponse(Response $response): PhoneNumberData
    {
        return PhoneNumberData::fromArray($response->json());
    }
}
