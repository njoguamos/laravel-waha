<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Message;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\MessageLinkCustomPreviewData;

class SendLinkCustomPreviewRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected MessageLinkCustomPreviewData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/send/link-custom-preview';
    }

    protected function defaultBody(): array
    {
        return [
            'session' => $this->session,
            ...$this->data->toArray(),
        ];
    }
}
