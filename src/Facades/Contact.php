<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Saloon\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all(string $sortBy = 'name', string $sortOrder = 'desc', int $limit = 100, int $offset = 0, ?string $session = null)
 * @method static Response exists(string $phone, ?string $session = null)
 * @method static Response get(string $contactId, ?string $session = null)
 * @method static Response allLids(int $limit = 100, int $offset = 0, ?string $session = null)
 * @method static Response getLid(string $phone, ?string $session = null)
 * @method static Response getAbout(string $contactId, ?string $session = null)
 * @method static Response block(string $contactId, ?string $session = null)
 * @method static Response unblock(string $contactId, ?string $session = null)
 * @method static Response getProfilePicture(string $contactId, bool $refresh = false, ?string $session = null)
 * @method static Response getPhoneNumber(string|int $lid, ?string $session = null)
 * @method static Response lidCount(?string $session = null)
 */
class Contact extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NjoguAmos\Waha\Endpoints\Contact::class;
    }
}
