<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Facades\Contacts;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\ContactExistsData;
use NjoguAmos\Waha\Requests\Contacts\CheckExistsRequest;

describe(description: 'check exists', tests: function () {
    it(description: 'can check if phone number exists', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '123123123@c.us',
            ]),
        ]);

        $result = Contacts::checkExists(phone: '11231231231', session: 'default');

        expect(value: $result)
            ->toBeInstanceOf(class: ContactExistsData::class)
            ->and(value: $result->numberExists)->toBeTrue()
            ->and(value: $result->chatId)->toBe(expected: '123123123@c.us');
    });

    it(description: 'can check if phone number does not exist', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => false,
                'chatId'       => null,
            ]),
        ]);

        $result = Contacts::checkExists(phone: '99999999999', session: 'default');

        expect(value: $result)
            ->toBeInstanceOf(class: ContactExistsData::class)
            ->and(value: $result->numberExists)->toBeFalse()
            ->and(value: $result->chatId)->toBeNull();
    });

    it(description: 'can check if phone number exists with custom session', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '55xxxxxxxxxxx@c.us',
            ]),
        ]);

        $result = Contacts::checkExists(phone: '55xxxxxxxxxxx', session: 'custom-session');

        expect(value: $result)
            ->toBeInstanceOf(class: ContactExistsData::class)
            ->and(value: $result->numberExists)->toBeTrue()
            ->and(value: $result->chatId)->toBe(expected: '55xxxxxxxxxxx@c.us');
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '123123123@c.us',
            ]),
        ]);

        $result = Contacts::checkExists(phone: '11231231231', session: null);

        expect(value: $result)
            ->toBeInstanceOf(class: ContactExistsData::class)
            ->and(value: $result->numberExists)->toBeTrue();

        MockClient::global()->assertSent(function (CheckExistsRequest $request): bool {
            return $request->query()->get('session') === 'test-session';
        });
    });
});
