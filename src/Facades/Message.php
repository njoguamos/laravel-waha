<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\ChatData;
use NjoguAmos\Waha\Dto\SeenData;
use Illuminate\Support\Facades\Facade;
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
use NjoguAmos\Waha\Dto\MessageLinkCustomPreviewData;
use NjoguAmos\Waha\Endpoints\Message as MessageEndpoint;

/**
 * @method static Response sendText(MessageTextData $data, ?string $session = null)
 * @method static Response sendImage(MessageImageData $data, ?string $session = null)
 * @method static Response sendFile(MessageFileData $data, ?string $session = null)
 * @method static Response sendVideo(MessageVideoData $data, ?string $session = null)
 * @method static Response sendVoice(MessageVoiceData $data, ?string $session = null)
 * @method static Response sendLocation(MessageLocationData $data, ?string $session = null)
 * @method static Response sendSeen(SeenData $data, ?string $session = null)
 * @method static Response sendPoll(MessagePollData $data, ?string $session = null)
 * @method static Response sendPollVote(MessagePollVoteData $data, ?string $session = null)
 * @method static Response sendList(MessageListData $data, ?string $session = null)
 * @method static Response forwardMessage(MessageForwardData $data, ?string $session = null)
 * @method static Response sendReaction(MessageReactionData $data, ?string $session = null)
 * @method static Response starMessage(MessageStarData $data, ?string $session = null)
 * @method static Response sendLinkCustomPreview(MessageLinkCustomPreviewData $data, ?string $session = null)
 * @method static Response sendContactVcard(MessageContactVcardData $data, ?string $session = null)
 * @method static Response sendButtonsReply(MessageButtonReplyData $data, ?string $session = null)
 * @method static Response startTyping(ChatData $data, ?string $session = null)
 * @method static Response stopTyping(ChatData $data, ?string $session = null)
 *
 * @see MessageEndpoint
 */
class Message extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MessageEndpoint::class;
    }
}
