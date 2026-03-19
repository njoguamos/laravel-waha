<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Observability\PingRequest;
use Saloon\Http\Response;

class Observability extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function ping(): Response
    {
        return $this->connector->send(
            request: new PingRequest()
        );
    }
}
