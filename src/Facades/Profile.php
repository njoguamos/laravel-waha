<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response get(?string $session = null)
 * @method static Response setName(string $name, ?string $session = null)
 * @method static Response setStatus(string $status, ?string $session = null)
 * @method static Response setPicture(string $file, ?string $session = null)
 * @method static Response deletePicture(?string $session = null)
 */
class Profile extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Profile::class;
    }
}
