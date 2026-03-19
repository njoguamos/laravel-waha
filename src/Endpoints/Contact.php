<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Contact\GetLidRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Contact\CheckExistsRequest;
use NjoguAmos\Waha\Requests\Contact\GetPhoneNumberRequest;

class Contact extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLid(string $phone, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetLidRequest(
                phone: $phone,
                session:     $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPhoneNumber(string|int $lid, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetPhoneNumberRequest(
                lid:     $lid,
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function checkExists(string $phone, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new CheckExistsRequest(
                phone:   $phone,
                session: $session ?? $this->session,
            )
        );
    }
}
