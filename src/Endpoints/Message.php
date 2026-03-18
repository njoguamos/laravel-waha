<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\MessageTextData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;
use Saloon\Exceptions\Request\FatalRequestException;

class Message extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendText(MessageTextData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendTextRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }
}
