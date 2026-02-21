<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use NjoguAmos\Waha\Dto\TextStatusData;
use NjoguAmos\Waha\Requests\SendTextStatusRequest;

class Status extends Waha
{
    /**
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function sendText(string $session, TextStatusData $data): TextStatusData
    {
        $response = $this->connector->send(
            request: new SendTextStatusRequest(
                session: $session,
                data: $data
            )
        );

        return $response->dtoOrFail();
    }
}
