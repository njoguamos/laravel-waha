<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageListSectionData
{
    /**
     * @param  MessageListRowData[]  $rows
     */
    public function __construct(
        public string $title,
        public array $rows,
    ) {
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'rows'  => array_map(static fn (MessageListRowData $row) => $row->toArray(), $this->rows),
        ];
    }
}
