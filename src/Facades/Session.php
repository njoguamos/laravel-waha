<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all(bool $all = true)
 * @method static Response create(\NjoguAmos\Waha\Dto\SessionCreateData $data)
 * @method static Response update(\NjoguAmos\Waha\Dto\SessionUpdateData $data, ?string $session = null)
 * @method static Response delete(?string $session = null)
 * @method static Response get(?string $session = null)
 * @method static Response me(?string $session = null)
 * @method static Response start(?string $session = null)
 * @method static Response logout(?string $session = null)
 * @method static Response restart(?string $session = null)
 * @method static Response screenshot(?string $session = null)
 * @method static Response stop(?string $session = null)
 *
 * @see \NjoguAmos\Waha\Endpoints\Session
 */
class Session extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Session::class;
    }
}
