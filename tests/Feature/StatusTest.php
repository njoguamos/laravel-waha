<?php

declare(strict_types=1);

use NjoguAmos\Waha\Facades\Status;
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

    $result = Status::sendText(session: 'default', data: $data);

    expect(value: $result)
        ->toBeInstanceOf(class: TextStatusData::class)
        ->and(value: $result->text)->toBe(expected: 'Hello from WhatsApp.')
        ->and(value: $result->backgroundColor)->toBe(expected: '#38b42f')
        ->and(value: $result->font)->toBe(expected: 1);
});
