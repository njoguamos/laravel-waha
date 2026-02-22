<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Dto\ContactExistsData;

/**
 * @method static ContactExistsData checkExists(string $phone, ?string $session = null)
 */
class Contacts extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Contacts::class;
    }
}
