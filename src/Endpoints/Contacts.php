<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Contacts\CheckExistsRequest;

class Contacts extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function checkExists(string $phone, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new CheckExistsRequest(
                phone: $phone,
                session: $session ?? $this->session,
            )
        );
    }
}
