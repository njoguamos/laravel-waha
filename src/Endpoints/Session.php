<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Session\StartSessionRequest;

class Session extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function start(?string $session = null): Response
    {
        return $this->connector->send(
            request: new StartSessionRequest(
                name: $session ?? $this->session,
            )
        );
    }
}
