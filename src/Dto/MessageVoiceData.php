<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use NjoguAmos\Waha\Enums\FileType;

class MessageVoiceData
{
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
        $isUrl = filter_var($this->file, FILTER_VALIDATE_URL) !== false;

        $fileData = [
            'mimetype' => $this->getMimeType($this->file),
            'filename' => $this->filename ?? ($isUrl ? basename(parse_url($this->file, PHP_URL_PATH)) : 'file'),
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

    private function getMimeType(string $file): string
    {
        if ($this->mimetype instanceof FileType) {
            return $this->mimetype->mime();
        }

        if (is_string($this->mimetype)) {
            return $this->mimetype;
        }

        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $extension = pathinfo(parse_url($file, PHP_URL_PATH), PATHINFO_EXTENSION);

            return FileType::tryFrom(mb_strtolower($extension))
                ? FileType::from(mb_strtolower($extension))->mime()
                : 'application/octet-stream';
        }

        // Base64 detection
        if (preg_match('/^data:([a-zA-Z0-9]+\/[a-zA-Z0-9.-]+);base64,/', $file, $matches)) {
            return $matches[1];
        }

        // If it's just raw base64 data, we try to detect by decoding a small portion
        $data = base64_decode(mb_substr($file, 0, 128), true);

        if ($data !== false) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);

            if ($finfo !== false) {
                $mimeType = finfo_buffer($finfo, $data);
                finfo_close($finfo);

                if ($mimeType !== false) {
                    return $mimeType;
                }
            }
        }

        return 'application/octet-stream';
    }
}
