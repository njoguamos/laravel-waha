<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\LidData;
use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Facades\Contact;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\PhoneNumberData;
use NjoguAmos\Waha\Requests\Contact\GetLidRequest;
use NjoguAmos\Waha\Requests\Contact\CountLidsRequest;
use NjoguAmos\Waha\Requests\Contact\GetAllLidsRequest;
use NjoguAmos\Waha\Requests\Contact\CheckExistsRequest;
use NjoguAmos\Waha\Requests\Contact\GetPhoneNumberRequest;

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

        $response = Contact::getAllLids();
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

        $response = Contact::getAllLids(limit: 50, offset: 10, session: 'custom-session');

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

        $result = Contact::checkExists(phone: '11231231231');

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

        $result = Contact::checkExists(phone: '99999999999');

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

        $result = Contact::checkExists(phone: '55xxxxxxxxxxx', session: 'custom-session');

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

        $result = Contact::checkExists(phone: '11231231231');

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

        $response = Contact::countLids();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'count'))->toBe(expected: 123);
    });

    it(description: 'can get count with custom session', closure: function () {
        MockClient::global(mockData: [
            CountLidsRequest::class => MockResponse::make([
                'count' => 5,
            ], status: 200),
        ]);

        $response = Contact::countLids(session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (CountLidsRequest $request): bool {
            return str_contains($request->resolveEndpoint(), 'custom-session')
                && str_contains($request->resolveEndpoint(), '/lids/count');
        });
    });
});
