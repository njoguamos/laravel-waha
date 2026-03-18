<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Session\StopSessionRequest;
use NjoguAmos\Waha\Requests\Session\ListSessionsRequest;
use NjoguAmos\Waha\Requests\Session\StartSessionRequest;
use NjoguAmos\Waha\Requests\Session\LogoutSessionRequest;
use NjoguAmos\Waha\Requests\Session\RestartSessionRequest;

class Session extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function all(bool $all = true): Response
    {
        return $this->connector->send(
            request: new ListSessionsRequest(
                all: $all,
            )
        );
    }

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

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function logout(?string $session = null): Response
    {
        return $this->connector->send(
            request: new LogoutSessionRequest(
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function restart(?string $session = null): Response
    {
        return $this->connector->send(
            request: new RestartSessionRequest(
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function stop(?string $session = null): Response
    {
        return $this->connector->send(
            request: new StopSessionRequest(
                session: $session ?? $this->session,
            )
        );
    }
}
