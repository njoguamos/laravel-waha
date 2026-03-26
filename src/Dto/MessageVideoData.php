<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageVideoData
{
    public function __construct(
        public string $chatId,
        public array $file,
        public bool $convert = false,
        public ?string $reply_to = null,
        public ?string $caption = null,
        public bool $asNote = false,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId'  => $this->chatId,
            'file'    => $this->file,
            'convert' => $this->convert,
        ];

        if ($this->reply_to !== null) {
            $array['reply_to'] = $this->reply_to;
        }

        if ($this->caption !== null) {
            $array['caption'] = $this->caption;
        }

        if ($this->asNote) {
            $array['asNote'] = $this->asNote;
        }

        return $array;
    }
}
