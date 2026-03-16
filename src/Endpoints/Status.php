<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use RuntimeException;
use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;
use NjoguAmos\Waha\Dto\TextStatusData;
use NjoguAmos\Waha\Dto\ImageStatusData;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\FatalRequestException;
use NjoguAmos\Waha\Requests\Status\SendTextStatusRequest;
use NjoguAmos\Waha\Requests\Status\SendImageStatusRequest;

class Status extends Waha
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendText(TextStatusData $data, ?string $session = null): Response
    {
        return $this->connector->send(
            request: new SendTextStatusRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendImage(ImageStatusData $data, ?string $session = null): Response
    {
        $engine = config(key: 'waha.engine');
        $version = config(key: 'waha.version');

        if ($engine === Engine::WPP->value && $version === Version::CORE->value) {
            throw new RuntimeException(message: "Send Image Status is not supported on {$version} version using {$engine} engine.");
        }

        return $this->connector->send(
            request: new SendImageStatusRequest(
                session: $session ?? $this->session,
                data: $data
            )
        );
    }
}
