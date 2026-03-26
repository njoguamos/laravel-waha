<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\FileType;
use NjoguAmos\Waha\Traits\ResolvesMimeType;

class MessageVoiceData
{
    use ResolvesMimeType;

    public function __construct(
        public string $chatId,
        public string $file,
        public bool $convert = false,
        public ?string $filename = null,
        public string|FileType|null $mimetype = null,
        public ?string $reply_to = null,
    ) {
    }

    public function toArray(): array
    {
        $isUrl = str_starts_with($this->file, 'http');

        $fileData = [
            'mimetype' => $this->getMimeType($this->file, $this->mimetype),
            'filename' => $this->getFilename($this->file, $this->filename),
        ];

        if ($isUrl) {
            $fileData['url'] = $this->file;
        } else {
            $fileData['data'] = $this->file;
        }

        $array = [
            'chatId'  => $this->chatId,
            'file'    => $fileData,
            'convert' => $this->convert,
        ];

        if ($this->reply_to !== null) {
            $array['reply_to'] = $this->reply_to;
        }

        return $array;
    }
}
