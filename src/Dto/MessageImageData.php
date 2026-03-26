<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageImageData
{
    public function __construct(
        public string $chatId,
        public array $file,
        public ?string $reply_to = null,
        public ?string $caption = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId' => $this->chatId,
            'file'   => $this->file,
        ];

        if ($this->reply_to !== null) {
            $array['reply_to'] = $this->reply_to;
        }

        if ($this->caption !== null) {
            $array['caption'] = $this->caption;
        }

        return $array;
    }
}
