<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Dto\MessagePollData;
use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Dto\MessageTextData;
use NjoguAmos\Waha\Dto\MessagePollVoteData;

/**
 * @method static Response sendText(MessageTextData $data, ?string $session = null)
 * @method static Response sendSeen(SeenData $data, ?string $session = null)
 * @method static Response sendPoll(MessagePollData $data, ?string $session = null)
 * @method static Response sendPollVote(MessagePollVoteData $data, ?string $session = null)
 */
class Message extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Message::class;
    }
}
