<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageListRowData
{
    public function __construct(
        public string $title,
        public string $rowId,
        public ?string $description = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'title'       => $this->title,
            'rowId'       => $this->rowId,
            'description' => $this->description,
        ];
    }
}
