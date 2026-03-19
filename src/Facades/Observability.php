<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Endpoints\Observability as ObservabilityEndpoint;

/**
 * @method static \Saloon\Http\Response ping()
 *
 * @see \NjoguAmos\Waha\Endpoints\Observability
 */
class Observability extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ObservabilityEndpoint::class;
    }
}
