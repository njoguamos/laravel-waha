<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Endpoints\Presence as PresenceEndpoint;

/**
 * @method static Response set(\NjoguAmos\Waha\Dto\PresenceData $data, ?string $session = null)
 * @method static Response get(string $chatId, ?string $session = null)
 * @method static Response subscribe(string $chatId, ?string $session = null)
 * @method static Response all(?string $session = null)
 */
class Presence extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PresenceEndpoint::class;
    }
}
