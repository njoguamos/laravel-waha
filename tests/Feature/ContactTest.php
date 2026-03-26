<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\LidData;
use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Dto\ContactData;
use NjoguAmos\Waha\Facades\Contact;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\PhoneNumberData;
use NjoguAmos\Waha\Requests\Contact\GetLidRequest;
use NjoguAmos\Waha\Requests\Contact\GetAboutRequest;
use NjoguAmos\Waha\Requests\Contact\CountLidsRequest;
use NjoguAmos\Waha\Requests\Contact\GetAllLidsRequest;
use NjoguAmos\Waha\Requests\Contact\GetContactRequest;
use NjoguAmos\Waha\Requests\Contact\CheckExistsRequest;
use NjoguAmos\Waha\Requests\Contact\BlockContactRequest;
use NjoguAmos\Waha\Requests\Contact\GetAllContactsRequest;
use NjoguAmos\Waha\Requests\Contact\GetPhoneNumberRequest;
use NjoguAmos\Waha\Requests\Contact\UnblockContactRequest;
use NjoguAmos\Waha\Requests\Contact\GetProfilePictureRequest;

describe(description: 'get all contacts', tests: function () {
    it(description: 'can get all contacts', closure: function () {
        MockClient::global(mockData: [
            GetAllContactsRequest::class => MockResponse::make([
                [
                    'id'          => '11231231231@c.us',
                    'number'      => '11231231231',
                    'name'        => 'Contact Name',
                    'pushname'    => 'Pushname',
                    'shortName'   => 'Shortname',
                    'isMe'        => true,
                    'isGroup'     => false,
                    'isWAContact' => true,
                    'isMyContact' => true,
                    'isBlocked'   => false,
                ],
            ], status: 200),
        ]);

        $response = Contact::all();
        $dtos = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dtos)->toBeArray()
            ->and(value: $dtos[0])->toBeInstanceOf(class: ContactData::class)
            ->and(value: $dtos[0]->id)->toBe(expected: '11231231231@c.us')
            ->and(value: $dtos[0]->number)->toBe(expected: '11231231231')
            ->and(value: $dtos[0]->name)->toBe(expected: 'Contact Name')
            ->and(value: $dtos[0]->pushname)->toBe(expected: 'Pushname')
            ->and(value: $dtos[0]->shortName)->toBe(expected: 'Shortname')
            ->and(value: $dtos[0]->isMe)->toBeTrue()
            ->and(value: $dtos[0]->isGroup)->toBeFalse()
            ->and(value: $dtos[0]->isWAContact)->toBeTrue()
            ->and(value: $dtos[0]->isMyContact)->toBeTrue()
            ->and(value: $dtos[0]->isBlocked)->toBeFalse();
    });

    it(description: 'can get all contacts with partial fields', closure: function () {
        MockClient::global(mockData: [
            GetAllContactsRequest::class => MockResponse::make([
                [
                    'id'     => '11231231231@c.us',
                    'number' => '11231231231',
                ],
            ], status: 200),
        ]);

        $response = Contact::all();
        $dtos = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dtos[0]->id)->toBe(expected: '11231231231@c.us')
            ->and(value: $dtos[0]->name)->toBeNull()
            ->and(value: $dtos[0]->isMe)->toBeNull();
    });

    it(description: 'uses default pagination and sorting parameters', closure: function () {
        MockClient::global(mockData: [
            GetAllContactsRequest::class => MockResponse::make([], status: 200),
        ]);

        $response = Contact::all();

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetAllContactsRequest $request): bool {
            return $request->query()->get('sortBy') === 'name'
                && $request->query()->get('sortOrder') === 'desc'
                && $request->query()->get('limit') === 100
                && $request->query()->get('offset') === 0;
        });
    });

    it(description: 'can get all contacts with custom pagination', closure: function () {
        MockClient::global(mockData: [
            GetAllContactsRequest::class => MockResponse::make([], status: 200),
        ]);

        $response = Contact::all(limit: 50, offset: 10, session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetAllContactsRequest $request): bool {
            return $request->query()->get('session') === 'custom-session'
                && $request->query()->get('limit') === 50
                && $request->query()->get('offset') === 10;
        });
    });

    it(description: 'can get all contacts with custom sorting', closure: function () {
        MockClient::global(mockData: [
            GetAllContactsRequest::class => MockResponse::make([], status: 200),
        ]);

        $response = Contact::all(sortBy: 'id', sortOrder: 'asc');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetAllContactsRequest $request): bool {
            return $request->query()->get('sortBy') === 'id'
                && $request->query()->get('sortOrder') === 'asc';
        });
    });
});

describe(description: 'get single contact', tests: function () {
    it(description: 'can get a contact by phone number', closure: function () {
        MockClient::global(mockData: [
            GetContactRequest::class => MockResponse::make([
                'id'          => '11231231231@c.us',
                'number'      => '11231231231',
                'name'        => 'Contact Name',
                'pushname'    => 'Pushname',
                'shortName'   => 'Shortname',
                'isMe'        => false,
                'isGroup'     => false,
                'isWAContact' => true,
                'isMyContact' => true,
                'isBlocked'   => false,
            ], status: 200),
        ]);

        $response = Contact::get(contactId: '11231231231');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto)->toBeInstanceOf(class: ContactData::class)
            ->and(value: $dto->id)->toBe(expected: '11231231231@c.us')
            ->and(value: $dto->number)->toBe(expected: '11231231231')
            ->and(value: $dto->name)->toBe(expected: 'Contact Name')
            ->and(value: $dto->isMyContact)->toBeTrue();
    });

    it(description: 'can get a contact by chat id', closure: function () {
        MockClient::global(mockData: [
            GetContactRequest::class => MockResponse::make([
                'id'     => '11231231231@c.us',
                'number' => '11231231231',
            ], status: 200),
        ]);

        $response = Contact::get(contactId: '11231231231@c.us');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto->id)->toBe(expected: '11231231231@c.us');
    });

    it(description: 'can get a contact by lid', closure: function () {
        MockClient::global(mockData: [
            GetContactRequest::class => MockResponse::make([
                'id'     => '123456@lid',
                'number' => null,
            ], status: 200),
        ]);

        $response = Contact::get(contactId: '123456@lid');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto->id)->toBe(expected: '123456@lid')
            ->and(value: $dto->number)->toBeNull();
    });

    it(description: 'can get a contact with custom session', closure: function () {
        MockClient::global(mockData: [
            GetContactRequest::class => MockResponse::make([
                'id'     => '11231231231@c.us',
                'number' => '11231231231',
            ], status: 200),
        ]);

        $response = Contact::get(contactId: '11231231231', session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetContactRequest $request): bool {
            return $request->query()->get('contactId') === '11231231231'
                && $request->query()->get('session') === 'custom-session';
        });
    });
});

describe(description: 'get all known lids', tests: function () {
    it(description: 'can get all known lids', closure: function () {
        MockClient::global(mockData: [
            GetAllLidsRequest::class => MockResponse::make([
                [
                    'lid' => '123123123@lid',
                    'pn'  => '123456789@c.us',
                ],
            ], status: 200),
        ]);

        $response = Contact::allLids();
        $dtos = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dtos)->toBeArray()
            ->and(value: $dtos[0])->toBeInstanceOf(class: LidData::class)
            ->and(value: $dtos[0]->lid)->toBe(expected: '123123123@lid')
            ->and(value: $dtos[0]->pn)->toBe(expected: '123456789@c.us');
    });

    it(description: 'can get all known lids with custom limit and offset', closure: function () {
        MockClient::global(mockData: [
            GetAllLidsRequest::class => MockResponse::make([], status: 200),
        ]);

        $response = Contact::allLids(limit: 50, offset: 10, session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetAllLidsRequest $request): bool {
            return str_contains($request->resolveEndpoint(), 'custom-session')
                && $request->query()->get('limit') === 50
                && $request->query()->get('offset') === 10;
        });
    });
});

describe(description: 'get lid by phone number', tests: function () {
    it(description: 'can get lid for a given phone number', closure: function () {
        MockClient::global(mockData: [
            GetLidRequest::class => MockResponse::make([
                'lid' => '123123123@lid',
                'pn'  => '123456789@c.us',
            ], status: 200),
        ]);

        $response = Contact::getLid(phone: '123456789@c.us');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto)->toBeInstanceOf(class: LidData::class)
            ->and(value: $dto->lid)->toBe(expected: '123123123@lid')
            ->and(value: $dto->pn)->toBe(expected: '123456789@c.us');
    });

    it(description: 'returns null lid if not found', closure: function () {
        MockClient::global(mockData: [
            GetLidRequest::class => MockResponse::make([
                'lid' => null,
                'pn'  => '123456789@c.us',
            ], status: 200),
        ]);

        $response = Contact::getLid(phone: '123456789@c.us');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto->lid)->toBeNull()
            ->and(value: $dto->pn)->toBe(expected: '123456789@c.us');
    });

    it(description: 'can get lid with custom session', closure: function () {
        MockClient::global(mockData: [
            GetLidRequest::class => MockResponse::make([
                'lid' => '123123123@lid',
                'pn'  => '123456789@c.us',
            ], status: 200),
        ]);

        $response = Contact::getLid(phone: '123456789', session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetLidRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/lids/pn/123456789';
        });
    });
});

describe(description: 'get phone number by lid', tests: function () {
    it(description: 'can get phone number for a given lid', closure: function () {
        MockClient::global(mockData: [
            GetPhoneNumberRequest::class => MockResponse::make([
                'lid' => '123123123@lid',
                'pn'  => '123456789@c.us',
            ], status: 200),
        ]);

        $response = Contact::getPhoneNumber(lid: '123123123@lid');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto)->toBeInstanceOf(class: PhoneNumberData::class)
            ->and(value: $dto->lid)->toBe(expected: '123123123@lid')
            ->and(value: $dto->pn)->toBe(expected: '123456789@c.us');
    });

    it(description: 'returns null phone number if not found', closure: function () {
        MockClient::global(mockData: [
            GetPhoneNumberRequest::class => MockResponse::make([
                'lid' => '123123123@lid',
                'pn'  => null,
            ], status: 200),
        ]);

        $response = Contact::getPhoneNumber(lid: '123123123@lid');
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto->pn)->toBeNull();
    });

    it(description: 'can get phone number with custom session and escapes @', closure: function () {
        MockClient::global(mockData: [
            GetPhoneNumberRequest::class => MockResponse::make([
                'lid' => '123123123@lid',
                'pn'  => '123456789@c.us',
            ], status: 200),
        ]);

        $response = Contact::getPhoneNumber(lid: '123123123@lid', session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetPhoneNumberRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/lids/123123123%40lid';
        });
    });
});

describe(description: 'check phone number exists', tests: function () {
    it(description: 'can check if phone number exists', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '123123123@c.us',
            ], status: 201),
        ]);

        $result = Contact::exists(phone: '11231231231');

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json())->toBeArray()
            ->and(value: $result->json(key: 'numberExists'))->toBeTrue()
            ->and(value: $result->json(key: 'chatId'))->toBe(expected: '123123123@c.us');
    });

    it(description: 'can check if phone number does not exist', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => false,
                'chatId'       => null,
            ], status: 201),
        ]);

        $result = Contact::exists(phone: '99999999999');

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'numberExists'))->toBeFalse()
            ->and(value: $result->json(key: 'chatId'))->toBeNull();
    });

    it(description: 'can check if phone number exists with custom session', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '55xxxxxxxxxxx@c.us',
            ], status: 201),
        ]);

        $result = Contact::exists(phone: '55xxxxxxxxxxx', session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'numberExists'))->toBeTrue()
            ->and(value: $result->json(key: 'chatId'))->toBe(expected: '55xxxxxxxxxxx@c.us');
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '123123123@c.us',
            ], status: 201),
        ]);

        $result = Contact::exists(phone: '11231231231');

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'numberExists'))->toBeTrue();

        MockClient::global()->assertSent(function (CheckExistsRequest $request): bool {
            return $request->query()->get('session') === 'test-session';
        });
    });
});

describe(description: 'get count of lids', tests: function () {
    it(description: 'can get the count of known lid mappings', closure: function () {
        MockClient::global(mockData: [
            CountLidsRequest::class => MockResponse::make([
                'count' => 123,
            ], status: 200),
        ]);

        $response = Contact::lidCount();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'count'))->toBe(expected: 123);
    });

    it(description: 'can get count with custom session', closure: function () {
        MockClient::global(mockData: [
            CountLidsRequest::class => MockResponse::make([
                'count' => 5,
            ], status: 200),
        ]);

        $response = Contact::lidCount(session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (CountLidsRequest $request): bool {
            return str_contains($request->resolveEndpoint(), 'custom-session')
                && str_contains($request->resolveEndpoint(), '/lids/count');
        });
    });
});

describe(description: 'get contact about', tests: function () {
    it(description: 'can get about info for a contact', closure: function () {
        MockClient::global(mockData: [
            GetAboutRequest::class => MockResponse::make([
                'about' => 'Hi, I use WhatsApp!',
            ], status: 200),
        ]);

        $response = Contact::getAbout(contactId: '123456789@c.us');

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'about'))->toBe(expected: 'Hi, I use WhatsApp!');
    });

    it(description: 'can get about info with custom session', closure: function () {
        MockClient::global(mockData: [
            GetAboutRequest::class => MockResponse::make([
                'about' => 'Available',
            ], status: 200),
        ]);

        Contact::getAbout(contactId: '123456789', session: 'custom-session');

        MockClient::global()->assertSent(function (GetAboutRequest $request): bool {
            return $request->query()->get(key: 'contactId') === '123456789'
                && $request->query()->get(key: 'session') === 'custom-session';
        });
    });
});

describe(description: 'get contact profile picture', tests: function () {
    it(description: 'can get profile picture URL for a contact', closure: function () {
        MockClient::global(mockData: [
            GetProfilePictureRequest::class => MockResponse::make([
                'profilePictureURL' => 'https://example.com/profile.jpg',
            ], status: 200),
        ]);

        $response = Contact::getProfilePicture(contactId: '123456789@c.us');

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'profilePictureURL'))->toBe(expected: 'https://example.com/profile.jpg');
    });

    it(description: 'can get profile picture with refresh and custom session', closure: function () {
        MockClient::global(mockData: [
            GetProfilePictureRequest::class => MockResponse::make([
                'profilePictureURL' => 'https://example.com/profile.jpg',
            ], status: 200),
        ]);

        Contact::getProfilePicture(contactId: '123456789', refresh: true, session: 'custom-session');

        MockClient::global()->assertSent(function (GetProfilePictureRequest $request): bool {
            return $request->query()->get(key: 'contactId') === '123456789'
                && $request->query()->get(key: 'refresh') === 'True'
                && $request->query()->get(key: 'session') === 'custom-session';
        });
    });
});

describe(description: 'block and unblock contact', tests: function () {
    it(description: 'can block a contact', closure: function () {
        MockClient::global(mockData: [
            BlockContactRequest::class => MockResponse::make([], status: 200),
        ]);

        $response = Contact::block(contactId: '123456789@c.us');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (BlockContactRequest $request): bool {
            return $request->body()->get(key: 'contactId') === '123456789@c.us';
        });
    });

    it(description: 'can block a contact with custom session', closure: function () {
        MockClient::global(mockData: [
            BlockContactRequest::class => MockResponse::make([], status: 200),
        ]);

        Contact::block(contactId: '123456789', session: 'custom-session');

        MockClient::global()->assertSent(function (BlockContactRequest $request): bool {
            return $request->body()->get(key: 'contactId') === '123456789'
                && $request->body()->get(key: 'session') === 'custom-session';
        });
    });

    it(description: 'can unblock a contact', closure: function () {
        MockClient::global(mockData: [
            UnblockContactRequest::class => MockResponse::make([], status: 200),
        ]);

        $response = Contact::unblock(contactId: '123456789@c.us');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (UnblockContactRequest $request): bool {
            return $request->body()->get(key: 'contactId') === '123456789@c.us';
        });
    });

    it(description: 'can unblock a contact with custom session', closure: function () {
        MockClient::global(mockData: [
            UnblockContactRequest::class => MockResponse::make([], status: 200),
        ]);

        Contact::unblock(contactId: '123456789', session: 'custom-session');

        MockClient::global()->assertSent(function (UnblockContactRequest $request): bool {
            return $request->body()->get(key: 'contactId') === '123456789'
                && $request->body()->get(key: 'session') === 'custom-session';
        });
    });
});
