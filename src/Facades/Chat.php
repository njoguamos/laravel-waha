<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Dto\ChatRequestData;
use NjoguAmos\Waha\Dto\MessageUpdateData;
use NjoguAmos\Waha\Endpoints\Chat as ChatEndpoint;

/**
 * @method static Response startTyping(ChatRequestData $data, ?string $session = null)
 * @method static Response stopTyping(ChatRequestData $data, ?string $session = null)
 * @method static Response deleteMessage(string $chatId, string $messageId, ?string $session = null)
 * @method static Response updateMessage(string $chatId, string $messageId, MessageUpdateData $data, ?string $session = null)
 *
 * @see ChatEndpoint
 */
class Chat extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ChatEndpoint::class;
    }
}
