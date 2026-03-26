<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Version;
use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Dto\ProfileData;
use NjoguAmos\Waha\Facades\Profile;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Requests\Profile\GetProfileRequest;
use NjoguAmos\Waha\Requests\Profile\SetProfileNameRequest;
use NjoguAmos\Waha\Requests\Profile\SetProfileStatusRequest;
use NjoguAmos\Waha\Requests\Profile\SetProfilePictureRequest;
use NjoguAmos\Waha\Requests\Profile\DeleteProfilePictureRequest;

describe(description: 'get profile', tests: function () {
    it(description: 'can get my profile', closure: function () {
        MockClient::global(mockData: [
            GetProfileRequest::class => MockResponse::make([
                'id'      => '11111111111@c.us',
                'name'    => 'My Name',
                'picture' => 'https://pps.whatsapp.net/v/t/123.jpg',
            ], status: 200),
        ]);

        $response = Profile::get();
        $dto = $response->dtoOrFail();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $dto)->toBeInstanceOf(class: ProfileData::class)
            ->and(value: $dto->id)->toBe(expected: '11111111111@c.us')
            ->and(value: $dto->name)->toBe(expected: 'My Name')
            ->and(value: $dto->picture)->toBe(expected: 'https://pps.whatsapp.net/v/t/123.jpg');
    });

    it(description: 'can get profile with custom session', closure: function () {
        MockClient::global(mockData: [
            GetProfileRequest::class => MockResponse::make([
                'id'      => '11111111111@c.us',
                'name'    => 'My Name',
                'picture' => null,
            ], status: 200),
        ]);

        $response = Profile::get(session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetProfileRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/profile';
        });
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            GetProfileRequest::class => MockResponse::make([
                'id'      => '11111111111@c.us',
                'name'    => 'My Name',
                'picture' => null,
            ], status: 200),
        ]);

        $response = Profile::get();

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (GetProfileRequest $request): bool {
            return $request->resolveEndpoint() === '/api/test-session/profile';
        });
    });

    it(description: 'can handle null picture', closure: function () {
        MockClient::global(mockData: [
            GetProfileRequest::class => MockResponse::make([
                'id'      => '11111111111@c.us',
                'name'    => 'My Name',
                'picture' => null,
            ], status: 200),
        ]);

        $response = Profile::get();
        $dto = $response->dtoOrFail();

        expect(value: $dto->picture)->toBeNull();
    });
});

describe(description: 'set profile name', tests: function () {
    it(description: 'can set profile name', closure: function () {
        MockClient::global(mockData: [
            SetProfileNameRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::setName(name: 'New Name');

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'success'))->toBeTrue();
    });

    it(description: 'can set profile name with custom session', closure: function () {
        MockClient::global(mockData: [
            SetProfileNameRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::setName(name: 'New Name', session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (SetProfileNameRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/profile/name'
                && $request->body()->get('name') === 'New Name';
        });
    });
});

describe(description: 'set profile status', tests: function () {
    it(description: 'can set profile status', closure: function () {
        MockClient::global(mockData: [
            SetProfileStatusRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::setStatus(status: 'Hey there! I am using WhatsApp.');

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'success'))->toBeTrue();
    });

    it(description: 'can set profile status with custom session', closure: function () {
        MockClient::global(mockData: [
            SetProfileStatusRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::setStatus(status: 'Available', session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (SetProfileStatusRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/profile/status'
                && $request->body()->get('status') === 'Available';
        });
    });
});

describe(description: 'set profile picture', tests: function () {
    it(description: 'can set profile picture with URL', closure: function () {
        config()->set(key: 'waha.version', value: Version::PRO);

        MockClient::global(mockData: [
            SetProfilePictureRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::setPicture(file: 'https://example.com/photo.jpg');

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'success'))->toBeTrue();
    });

    it(description: 'can set profile picture with custom session', closure: function () {
        config()->set(key: 'waha.version', value: Version::PRO);

        MockClient::global(mockData: [
            SetProfilePictureRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::setPicture(file: 'https://example.com/photo.jpg', session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (SetProfilePictureRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/profile/picture';
        });
    });

    it(description: 'sends url in body when file is a URL', closure: function () {
        config()->set(key: 'waha.version', value: Version::PRO);

        MockClient::global(mockData: [
            SetProfilePictureRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        Profile::setPicture(file: 'https://example.com/photo.png');

        MockClient::global()->assertSent(function (SetProfilePictureRequest $request): bool {
            $body = $request->body()->all();

            return $body['file']['url'] === 'https://example.com/photo.png'
                && $body['file']['mimetype'] === 'image/png';
        });
    });

    it(description: 'sends data in body when file is base64', closure: function () {
        config()->set(key: 'waha.version', value: Version::PRO);

        MockClient::global(mockData: [
            SetProfilePictureRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        Profile::setPicture(file: 'data:image/jpeg;base64,/9j/4AAQSkZJRg==');

        MockClient::global()->assertSent(function (SetProfilePictureRequest $request): bool {
            $body = $request->body()->all();

            return $body['file']['data'] === 'data:image/jpeg;base64,/9j/4AAQSkZJRg=='
                && $body['file']['mimetype'] === 'image/jpeg';
        });
    });

    it(description: 'throws runtime exception on CORE version', closure: function () {
        config()->set(key: 'waha.version', value: Version::CORE);

        expect(fn () => Profile::setPicture(file: 'https://example.com/photo.jpg'))
            ->toThrow(exception: RuntimeException::class, message: 'Set Profile Picture is not supported on CORE version. Upgrade to PLUS.');
    });
});

describe(description: 'delete profile picture', tests: function () {
    it(description: 'can delete profile picture', closure: function () {
        config()->set(key: 'waha.version', value: Version::PRO);

        MockClient::global(mockData: [
            DeleteProfilePictureRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::deletePicture();

        expect(value: $response->status())->toBe(expected: 200)
            ->and(value: $response->json(key: 'success'))->toBeTrue();
    });

    it(description: 'can delete profile picture with custom session', closure: function () {
        config()->set(key: 'waha.version', value: Version::PRO);

        MockClient::global(mockData: [
            DeleteProfilePictureRequest::class => MockResponse::make([
                'success' => true,
            ], status: 200),
        ]);

        $response = Profile::deletePicture(session: 'custom-session');

        expect(value: $response->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (DeleteProfilePictureRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/profile/picture';
        });
    });

    it(description: 'throws runtime exception on CORE version', closure: function () {
        config()->set(key: 'waha.version', value: Version::CORE);

        expect(fn () => Profile::deletePicture())
            ->toThrow(exception: RuntimeException::class, message: 'Delete Profile Picture is not supported on CORE version. Upgrade to PLUS.');
    });
});
