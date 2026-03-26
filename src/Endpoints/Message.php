<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ChatData;
use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Dto\MessageFileData;
use NjoguAmos\Waha\Dto\MessageListData;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\MessageStarData;
use NjoguAmos\Waha\Dto\MessageTextData;
use NjoguAmos\Waha\Dto\MessageImageData;
use NjoguAmos\Waha\Dto\MessageVideoData;
use NjoguAmos\Waha\Dto\MessageVoiceData;
use NjoguAmos\Waha\Dto\MessageForwardData;
use NjoguAmos\Waha\Dto\MessageLocationData;
use NjoguAmos\Waha\Dto\MessagePollVoteData;
use NjoguAmos\Waha\Dto\MessageReactionData;
use NjoguAmos\Waha\Dto\MessageButtonReplyData;
use NjoguAmos\Waha\Dto\MessageContactVcardData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Dto\MessageLinkCustomPreviewData;
use NjoguAmos\Waha\Requests\Message\SendFileRequest;
use NjoguAmos\Waha\Requests\Message\SendListRequest;
use NjoguAmos\Waha\Requests\Message\SendPollRequest;
use NjoguAmos\Waha\Requests\Message\SendSeenRequest;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Message\SendImageRequest;
use NjoguAmos\Waha\Requests\Message\SendVideoRequest;
use NjoguAmos\Waha\Requests\Message\SendVoiceRequest;
use NjoguAmos\Waha\Requests\Message\StopTypingRequest;
use NjoguAmos\Waha\Requests\Message\StarMessageRequest;
use NjoguAmos\Waha\Requests\Message\StartTypingRequest;
use NjoguAmos\Waha\Requests\Message\SendLocationRequest;
use NjoguAmos\Waha\Requests\Message\SendPollVoteRequest;
use NjoguAmos\Waha\Requests\Message\SendReactionRequest;
use NjoguAmos\Waha\Requests\Message\ForwardMessageRequest;
use NjoguAmos\Waha\Requests\Message\SendButtonsReplyRequest;
use NjoguAmos\Waha\Requests\Message\SendContactVcardRequest;
use NjoguAmos\Waha\Requests\Message\SendLinkCustomPreviewRequest;

class Message extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendText(MessageTextData $data, ?string $session = null): Response
    {
        $session = $this->resolveSession($session);

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
                session: $this->resolveSession($session),
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
                session: $this->resolveSession($session),
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
                session: $this->resolveSession($session),
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
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendLocation(MessageLocationData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendLocationRequest(
                session: $this->resolveSession($session),
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
                session: $this->resolveSession($session),
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
                session: $this->resolveSession($session),
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
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendList(MessageListData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendListRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function forwardMessage(MessageForwardData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new ForwardMessageRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendReaction(MessageReactionData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendReactionRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function starMessage(MessageStarData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new StarMessageRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendLinkCustomPreview(MessageLinkCustomPreviewData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendLinkCustomPreviewRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendContactVcard(MessageContactVcardData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendContactVcardRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendButtonsReply(MessageButtonReplyData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendButtonsReplyRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function startTyping(ChatData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new StartTypingRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function stopTyping(ChatData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new StopTypingRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    private function resolveSession(?string $session): string
    {
        return $session ?? $this->session;
    }
}
