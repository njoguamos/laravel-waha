<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\LinkPreviewData;
use NjoguAmos\Waha\Dto\MessageListData;
use NjoguAmos\Waha\Dto\MessageListRowData;
use NjoguAmos\Waha\Dto\MessageListSectionData;

test(description: 'message list data to array', closure: function () {
    $row1 = new MessageListRowData(title: 'Option 1', rowId: 'id1', description: 'Desc 1');
    $row2 = new MessageListRowData(title: 'Option 2', rowId: 'id2');
    $section = new MessageListSectionData(title: 'Section 1', rows: [$row1, $row2]);
    $list = new MessageListData(
        chatId: '123@c.us',
        title: 'Menu',
        button: 'Select',
        sections: [$section],
        description: 'Choose one',
        footer: 'Thanks',
        replyTo: 'msg123'
    );

    $array = $list->toArray();

    expect($array['chatId'])->toBe('123@c.us');
    expect($array['reply_to'])->toBe('msg123');
    expect($array['message']['title'])->toBe('Menu');
    expect($array['message']['sections'][0]['rows'][0]['title'])->toBe('Option 1');
    expect($array['message']['sections'][0]['rows'][1]['description'])->toBeNull();
});

test(description: 'link preview data to array', closure: function () {
    $preview = new LinkPreviewData(url: 'https://test.com', title: 'Test', description: 'Desc');
    expect($preview->toArray())->toBe([
        'url'         => 'https://test.com',
        'title'       => 'Test',
        'description' => 'Desc'
    ]);
});
