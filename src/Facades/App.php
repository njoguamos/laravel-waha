<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all(?string $session = null)
 * @method static Response create(\NjoguAmos\Waha\Dto\AppData $data)
 * @method static Response update(string $id, \NjoguAmos\Waha\Dto\AppData $data)
 * @method static Response delete(string $id)
 *
 * @see \NjoguAmos\Waha\Endpoints\App
 */
class App extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\App::class;
    }
}
