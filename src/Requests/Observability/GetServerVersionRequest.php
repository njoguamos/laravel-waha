<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;
use NjoguAmos\Waha\Dto\ServerVersionData;

class GetServerVersionRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/version';
    }

    /* @throws JsonException */
    public function createDtoFromResponse(Response $response): ServerVersionData
    {
        return new ServerVersionData(
            version: $response->json(key: 'version'),
            engine:  Engine::from($response->json(key: 'engine')),
            tier:    Version::from($response->json(key: 'tier')),
            browser: $response->json(key: 'browser'),
        );
    }
}
