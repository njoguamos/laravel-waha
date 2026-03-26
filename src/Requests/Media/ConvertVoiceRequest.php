<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Media;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use NjoguAmos\Waha\Dto\MediaConvertData;

class ConvertVoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $session,
        protected MediaConvertData $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/media/convert/voice';
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
