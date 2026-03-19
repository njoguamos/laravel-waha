<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response checkExists(string $phone, ?string $session = null)
 * @method static Response getAllLids(int $limit = 100, int $offset = 0, ?string $session = null)
 * @method static Response getLid(string $phone, ?string $session = null)
 * @method static Response getPhoneNumber(string|int $lid, ?string $session = null)
 * @method static Response countLids(?string $session = null)
 */
class Contact extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Contact::class;
    }
}
