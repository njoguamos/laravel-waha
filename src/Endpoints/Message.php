<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use Random\RandomException;
use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Enums\Presence;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Dto\MessageTextData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Message\SendSeenRequest;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;

class Message extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendText(MessageTextData $data, ?string $session = null): Response
    {
        $session ??= $this->session;

        // To avoid a ban, we start by sending a typing status if the config
        // is enabled. This will make it look like a human is typing
        // the message.
        if (config(key: 'waha.send_typing_status', default: true)) {
            $this->sendPresenceStatus(session: $session, chatId: $data->chatId);
        }

        return $this->connector->send(
            request: new SendTextRequest(session: $session, data: $data)
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendSeen(SeenData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendSeenRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws RandomException
     */
    private function sendPresenceStatus(string $session, string $chatId): void
    {
        // 1. Send Online status
        $this->connector->send(new SetPresenceRequest(
            session: $session,
            data: new PresenceData(presence: Presence::ONLINE)
        ));

        sleep(random_int(min: 1, max: 10));

        // 2. Send Typing status
        $this->connector->send(new SetPresenceRequest(
            session: $session,
            data: new PresenceData(presence: Presence::TYPING, chatId: $chatId)
        ));

        sleep(random_int(min: 1, max: 10));

        // 3. Send Paused status
        $this->connector->send(new SetPresenceRequest(
            session: $session,
            data: new PresenceData(presence: Presence::PAUSED, chatId: $chatId)
        ));

        sleep(random_int(min: 1, max: 10));
    }
}
