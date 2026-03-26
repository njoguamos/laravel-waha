<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageListData
{
    /**
     * @param  MessageListSectionData[]  $sections
     */
    public function __construct(
        public string $chatId,
        public string $title,
        public string $button,
        public array $sections,
        public ?string $description = null,
        public ?string $footer = null,
        public ?string $replyTo = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId'   => $this->chatId,
            'reply_to' => $this->replyTo,
            'message'  => [
                'title'       => $this->title,
                'description' => $this->description,
                'footer'      => $this->footer,
                'button'      => $this->button,
                'sections'    => array_map(static fn (MessageListSectionData $section) => $section->toArray(), $this->sections),
            ],
        ];
    }
}
