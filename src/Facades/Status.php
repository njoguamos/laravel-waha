<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Dto\TextStatusData;

/**
 * @method static Response sendText(TextStatusData $data, ?string $session = null)
 */
class Status extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Status::class;
    }
}
