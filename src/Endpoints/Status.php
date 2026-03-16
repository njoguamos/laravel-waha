<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\TextStatusData;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Status\SendTextStatusRequest;

class Status extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendText(TextStatusData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendTextStatusRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }
}
