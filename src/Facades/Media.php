<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Endpoints\Media as MediaEndpoint;

/**
 * @method static \Saloon\Http\Response convertVoice(\NjoguAmos\Waha\Dto\MediaConvertData $data, ?string $session = null)
 * @method static \Saloon\Http\Response convertVideo(\NjoguAmos\Waha\Dto\MediaConvertData $data, ?string $session = null)
 *
 * @see \NjoguAmos\Waha\Endpoints\Media
 */
class Media extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MediaEndpoint::class;
    }
}
