<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use RuntimeException;
use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Enums\Version;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Profile\GetProfileRequest;
use NjoguAmos\Waha\Requests\Profile\SetProfileNameRequest;
use NjoguAmos\Waha\Requests\Profile\SetProfileStatusRequest;
use NjoguAmos\Waha\Requests\Profile\SetProfilePictureRequest;
use NjoguAmos\Waha\Requests\Profile\DeleteProfilePictureRequest;

class Profile extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetProfileRequest(
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function setName(string $name, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SetProfileNameRequest(
                session: $session ?? $this->session,
                name: $name,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function setStatus(string $status, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SetProfileStatusRequest(
                session: $session ?? $this->session,
                status: $status,
            )
        );
    }

    /**
     * @throws RuntimeException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function setPicture(string $file, ?string $session = null): Response
    {
        $version = config(key: 'waha.version');

        if ($version === Version::CORE) {
            throw new RuntimeException(message: 'Set Profile Picture is not supported on CORE version. Upgrade to PLUS.');
        }

        return $this->connector->send(
            request: new SetProfilePictureRequest(
                session: $session ?? $this->session,
                file: $file,
            )
        );
    }

    /**
     * @throws RuntimeException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deletePicture(?string $session = null): Response
    {
        $version = config(key: 'waha.version');

        if ($version === Version::CORE) {
            throw new RuntimeException(message: 'Delete Profile Picture is not supported on CORE version. Upgrade to PLUS.');
        }

        return $this->connector->send(
            request: new DeleteProfilePictureRequest(
                session: $session ?? $this->session,
            )
        );
    }
}
