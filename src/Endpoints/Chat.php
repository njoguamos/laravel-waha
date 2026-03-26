<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ChatRequestData;
use NjoguAmos\Waha\Dto\MessageUpdateData;
use Saloon\Exceptions\Request\RequestException;
use NjoguAmos\Waha\Requests\Chat\StopTypingRequest;
use NjoguAmos\Waha\Requests\Chat\StartTypingRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Chat\DeleteMessageRequest;
use NjoguAmos\Waha\Requests\Chat\UpdateMessageRequest;

class Chat extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function startTyping(ChatRequestData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new StartTypingRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function stopTyping(ChatRequestData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new StopTypingRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteMessage(string $chatId, string $messageId, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new DeleteMessageRequest(
                session: $session ?? $this->session,
                chatId: $chatId,
                messageId: $messageId
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateMessage(string $chatId, string $messageId, MessageUpdateData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new UpdateMessageRequest(
                session: $session ?? $this->session,
                chatId: $chatId,
                messageId: $messageId,
                data: $data
            )
        );
    }
}
