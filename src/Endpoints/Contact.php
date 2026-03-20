<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Contact\GetLidRequest;
use NjoguAmos\Waha\Requests\Contact\GetAboutRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Contact\CountLidsRequest;
use NjoguAmos\Waha\Requests\Contact\GetAllLidsRequest;
use NjoguAmos\Waha\Requests\Contact\CheckExistsRequest;
use NjoguAmos\Waha\Requests\Contact\BlockContactRequest;
use NjoguAmos\Waha\Requests\Contact\GetPhoneNumberRequest;
use NjoguAmos\Waha\Requests\Contact\UnblockContactRequest;
use NjoguAmos\Waha\Requests\Contact\GetProfilePictureRequest;

class Contact extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function allLids(int $limit = 100, int $offset = 0, ?string $session = null): Response
    {
        $limit = max(1, $limit);
        $offset = max(0, $offset);

        return $this->connector->send(
            request: new GetAllLidsRequest(
                session: $session ?? $this->session,
                limit:   $limit,
                offset:  $offset,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLid(string $phone, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetLidRequest(
                phone: $phone,
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPhoneNumber(string|int $lid, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetPhoneNumberRequest(
                lid:     $lid,
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function exists(string $phone, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new CheckExistsRequest(
                phone:   $phone,
                session: $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAbout(string $contactId, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetAboutRequest(
                contactId: $contactId,
                session:   $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getProfilePicture(string $contactId, bool $refresh = false, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new GetProfilePictureRequest(
                contactId: $contactId,
                refresh:   $refresh,
                session:   $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function block(string $contactId, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new BlockContactRequest(
                contactId: $contactId,
                session:   $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function unblock(string $contactId, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new UnblockContactRequest(
                contactId: $contactId,
                session:   $session ?? $this->session,
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function lidCount(?string $session = null): Response
    {
        return $this->connector->send(
            request: new CountLidsRequest(
                session: $session ?? $this->session,
            )
        );
    }
}
