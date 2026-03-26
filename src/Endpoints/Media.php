<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\MediaConvertData;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Media\ConvertVideoRequest;
use NjoguAmos\Waha\Requests\Media\ConvertVoiceRequest;

class Media extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function convertVoice(MediaConvertData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new ConvertVoiceRequest(
                session: $this->resolveSession($session),
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function convertVideo(MediaConvertData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new ConvertVideoRequest(
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
