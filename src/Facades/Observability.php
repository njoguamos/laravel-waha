<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Endpoints\Observability as ObservabilityEndpoint;

/**
 * @method static \Saloon\Http\Response health()
 * @method static \Saloon\Http\Response ping()
 * @method static \Saloon\Http\Response version()
 * @method static \Saloon\Http\Response status()
 * @method static \Saloon\Http\Response stop(bool $force = false)
 * @method static \Saloon\Http\Response heapSnapshot()
 * @method static \Saloon\Http\Response cpuProfile(int $seconds = 30)
 * @method static \Saloon\Http\Response browserTrace(?string $session = null, int $seconds = 30, string $categories = '*')
 * @method static \Saloon\Http\Response environment(bool $all = false)
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
