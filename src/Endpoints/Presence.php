<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;
use NjoguAmos\Waha\Requests\Presence\GetAllPresenceRequest;
use NjoguAmos\Waha\Requests\Presence\GetChatPresenceRequest;
use NjoguAmos\Waha\Requests\Presence\SubscribePresenceRequest;

class Presence extends Waha
{
    public function set(PresenceData $data, ?string $session = null): Response
    {
        return $this->connector->send(new SetPresenceRequest(
            session: $session ?? $this->session,
            data: $data,
        ));
    }

    public function get(string $chatId, ?string $session = null): Response
    {
        return $this->connector->send(new GetChatPresenceRequest(
            session: $session ?? $this->session,
            chatId: $chatId,
        ));
    }

    public function subscribe(string $chatId, ?string $session = null): Response
    {
        return $this->connector->send(new SubscribePresenceRequest(
            session: $session ?? $this->session,
            chatId: $chatId,
        ));
    }

    public function all(?string $session = null): Response
    {
        return $this->connector->send(new GetAllPresenceRequest(
            session: $session ?? $this->session,
        ));
    }
}
