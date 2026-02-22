<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\TextStatusData;
use NjoguAmos\Waha\Requests\Status\SendTextStatusRequest;

test(description: 'it can send text status', closure: function () {
    MockClient::global(mockData: [
        SendTextStatusRequest::class => MockResponse::make([
            'text'            => 'Hello from WhatsApp.',
            'backgroundColor' => '#38b42f',
            'font'            => 1,
        ]),
    ]);

    $data = new TextStatusData(
        text: 'Hello from WhatsApp.',
        backgroundColor: '#38b42f',
        font: 1
    );

    expect(value: $data->text)->toBe(expected: 'Hello from WhatsApp.')
        ->and(value: $data->backgroundColor)->toBe(expected: '#38b42f')
        ->and(value: $data->font)->toBe(expected: 1);
});
