<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Dto\MessageFileData;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\MessageTextData;
use NjoguAmos\Waha\Dto\MessageImageData;
use NjoguAmos\Waha\Dto\MessageVideoData;
use NjoguAmos\Waha\Dto\MessageVoiceData;
use NjoguAmos\Waha\Dto\MessagePollVoteData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Message\SendFileRequest;
use NjoguAmos\Waha\Requests\Message\SendPollRequest;
use NjoguAmos\Waha\Requests\Message\SendSeenRequest;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Message\SendImageRequest;
use NjoguAmos\Waha\Requests\Message\SendVideoRequest;
use NjoguAmos\Waha\Requests\Message\SendVoiceRequest;
use NjoguAmos\Waha\Requests\Message\SendPollVoteRequest;

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
        if (config(key: 'waha.send_typing_status')) {
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
    public function sendImage(MessageImageData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendImageRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendFile(MessageFileData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendFileRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendVideo(MessageVideoData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendVideoRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendVoice(MessageVoiceData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendVoiceRequest(
                session: $session ?? $this->session,
                data: $data
            )
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
     */
    public function sendPoll(MessagePollData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendPollRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendPollVote(MessagePollVoteData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendPollVoteRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }
}
