<?php

declare(strict_types=1);

use NjoguAmos\Waha\Facades\Media;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\MediaConvertData;
use NjoguAmos\Waha\Requests\Media\ConvertVideoRequest;
use NjoguAmos\Waha\Requests\Media\ConvertVoiceRequest;

describe(description: 'media conversion', tests: function () {
    it(description: 'can convert voice to whatsapp format', closure: function () {
        MockClient::global(mockData: [
            ConvertVoiceRequest::class => MockResponse::make(body: [], status: 200)
        ]);

        $data = new MediaConvertData(
            url: 'https://example.com/voice.mp3'
        );

        $result = Media::convertVoice(data: $data);

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (ConvertVoiceRequest $request): bool {
            return $request->resolveEndpoint() === '/api/default/media/convert/voice'
                && $request->body()->get('url') === 'https://example.com/voice.mp3';
        });
    });

    it(description: 'can convert video to whatsapp format', closure: function () {
        MockClient::global(mockData: [
            ConvertVideoRequest::class => MockResponse::make(body: [], status: 200)
        ]);

        $data = new MediaConvertData(
            url: 'https://example.com/video.mkv'
        );

        $result = Media::convertVideo(data: $data);

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (ConvertVideoRequest $request): bool {
            return $request->resolveEndpoint() === '/api/default/media/convert/video'
                && $request->body()->get('url') === 'https://example.com/video.mkv';
        });
    });
});
