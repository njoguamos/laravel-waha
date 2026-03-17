<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Facades\Contact;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Requests\Contact\CheckExistsRequest;

describe(description: 'check phone number exists', tests: function () {
    it(description: 'can check if phone number exists', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '123123123@c.us',
            ]),
        ]);

        $result = Contact::checkExists(phone: '11231231231');

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json())->toBeArray()
            ->and(value: $result->json(key: 'numberExists'))->toBeTrue()
            ->and(value: $result->json(key: 'chatId'))->toBe(expected: '123123123@c.us');
    });

    it(description: 'can check if phone number does not exist', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => false,
                'chatId'       => null,
            ]),
        ]);

        $result = Contact::checkExists(phone: '99999999999');

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json(key: 'numberExists'))->toBeFalse()
            ->and(value: $result->json(key: 'chatId'))->toBeNull();
    });

    it(description: 'can check if phone number exists with custom session', closure: function () {
        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '55xxxxxxxxxxx@c.us',
            ]),
        ]);

        $result = Contact::checkExists(phone: '55xxxxxxxxxxx', session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json(key: 'numberExists'))->toBeTrue()
            ->and(value: $result->json(key: 'chatId'))->toBe(expected: '55xxxxxxxxxxx@c.us');
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            CheckExistsRequest::class => MockResponse::make([
                'numberExists' => true,
                'chatId'       => '123123123@c.us',
            ]),
        ]);

        $result = Contact::checkExists(phone: '11231231231');

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json(key: 'numberExists'))->toBeTrue();

        MockClient::global()->assertSent(function (CheckExistsRequest $request): bool {
            return $request->query()->get('session') === 'test-session';
        });
    });
});
