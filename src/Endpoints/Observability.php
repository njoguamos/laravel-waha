<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Observability\PingRequest;
use NjoguAmos\Waha\Requests\Observability\RestartServerRequest;
use NjoguAmos\Waha\Requests\Observability\GetHealthCheckRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerStatusRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerVersionRequest;
use NjoguAmos\Waha\Requests\Observability\GetNodeCpuProfileRequest;
use NjoguAmos\Waha\Requests\Observability\GetNodeHeapSnapshotRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerEnvVariablesRequest;

class Observability extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function health(): Response
    {
        return $this->connector->send(
            request: new GetHealthCheckRequest()
        );
    }

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

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function version(): Response
    {
        return $this->connector->send(
            request: new GetServerVersionRequest()
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function environment(bool $all = false): Response
    {
        return $this->connector->send(
            request: new GetServerEnvVariablesRequest(all: $all)
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function status(): Response
    {
        return $this->connector->send(
            request: new GetServerStatusRequest()
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function stop(bool $force = false): Response
    {
        return $this->connector->send(
            request: new RestartServerRequest(force: $force)
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function heapSnapshot(): Response
    {
        return $this->connector->send(
            request: new GetNodeHeapSnapshotRequest()
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function cpuProfile(int $seconds = 30): Response
    {
        return $this->connector->send(
            request: new GetNodeCpuProfileRequest(seconds: $seconds)
        );
    }
}
