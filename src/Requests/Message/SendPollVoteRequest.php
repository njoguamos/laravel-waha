<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Message;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\MessagePollVoteData;

class SendPollVoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected MessagePollVoteData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/sendPollVote';
    }

    protected function defaultBody(): array
    {
        return [
            'session' => $this->session,
            ...$this->data->toArray()
        ];
    }
}
