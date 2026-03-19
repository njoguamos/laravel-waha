<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\SessionCreateData;
use NjoguAmos\Waha\Dto\SessionUpdateData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Session\GetMeRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Session\GetSessionRequest;
use NjoguAmos\Waha\Requests\Session\ScreenshotRequest;
use NjoguAmos\Waha\Requests\Session\StopSessionRequest;
use NjoguAmos\Waha\Requests\Session\ListSessionsRequest;
use NjoguAmos\Waha\Requests\Session\StartSessionRequest;
use NjoguAmos\Waha\Requests\Session\CreateSessionRequest;
use NjoguAmos\Waha\Requests\Session\DeleteSessionRequest;
use NjoguAmos\Waha\Requests\Session\LogoutSessionRequest;
use NjoguAmos\Waha\Requests\Session\UpdateSessionRequest;
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
    public function create(SessionCreateData $data): Response
    {
        return $this->connector->send(
            request: new CreateSessionRequest(
                data: $data,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function update(SessionUpdateData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new UpdateSessionRequest(
                session: $session ?? $this->session,
                data: $data,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function delete(?string $session = null): Response
    {
        return $this->connector->send(
            request: new DeleteSessionRequest(
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetSessionRequest(
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function me(?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetMeRequest(
                session: $session ?? $this->session,
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
                session: $session ?? $this->session,
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
    public function screenshot(?string $session = null): Response
    {
        return $this->connector->send(
            request: new ScreenshotRequest(
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
