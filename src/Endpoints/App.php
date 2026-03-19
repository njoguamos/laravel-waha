<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\AppData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\App\ListAppsRequest;
use NjoguAmos\Waha\Requests\App\CreateAppRequest;
use NjoguAmos\Waha\Requests\App\DeleteAppRequest;
use NjoguAmos\Waha\Requests\App\UpdateAppRequest;
use Saloon\Exceptions\Request\FatalRequestException;

class App extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function all(?string $session = null): Response
    {
        return $this->connector->send(
            request: new ListAppsRequest(
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(AppData $data): Response
    {
        return $this->connector->send(
            request: new CreateAppRequest(
                data: $data,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function update(string $id, AppData $data): Response
    {
        return $this->connector->send(
            request: new UpdateAppRequest(
                id: $id,
                data: $data,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function delete(string $id): Response
    {
        return $this->connector->send(
            request: new DeleteAppRequest(
                id: $id,
            )
        );
    }
}
