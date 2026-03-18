<?php

declare(strict_types=1);

namespace NjoguAmos\Waha;

use Illuminate\Support\Sleep;
use NjoguAmos\Waha\Enums\Presence;
use Illuminate\Support\Facades\Log;
use NjoguAmos\Waha\Dto\PresenceData;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;

abstract class Waha
{
    protected WahaConnector $connector;

    protected string $session;

    public function __construct()
    {
        $this->connector = app(abstract: WahaConnector::class);

        $this->session = config(key: 'waha.session', default: 'default');
    }

    /**
     * Send the presence status before sending a message to mimic human behavior.
     */
    protected function sendPresenceStatus(string $session, string $chatId): void
    {
        // 1. Send Online status
        try {
            $this->connector->send(new SetPresenceRequest(
                session: $session,
                data: new PresenceData(presence: Presence::ONLINE)
            ));
        } catch (FatalRequestException|RequestException $exception) {
            Log::error(
                message: $exception->getMessage(),
                context: [
                    'session' => $session,
                    'chatId'  => $chatId,
                ]
            );
        }

        $this->humanDelay();

        // 2. Send Typing status
        try {
            $this->connector->send(new SetPresenceRequest(
                session: $session,
                data: new PresenceData(presence: Presence::TYPING, chatId: $chatId)
            ));
        } catch (FatalRequestException|RequestException $exception) {
            Log::error(
                message: $exception->getMessage(),
                context: [
                    'session' => $session,
                    'chatId'  => $chatId,
                ]
            );
        }

        $this->humanDelay(min: 1, max: 5);

        // 3. Send Paused status
        try {
            $this->connector->send(new SetPresenceRequest(
                session: $session,
                data: new PresenceData(presence: Presence::PAUSED, chatId: $chatId)
            ));
        } catch (FatalRequestException|RequestException $exception) {
            Log::error(
                message: $exception->getMessage(),
                context: [
                    'session' => $session,
                    'chatId'  => $chatId,
                ]
            );
        }

        $this->humanDelay(min: 1, max: 5);
    }

    protected function humanDelay(int $min = 1, int $max = 10): void
    {
        Sleep::for(duration: mt_rand(min: $min, max: $max))->seconds();
    }
}
