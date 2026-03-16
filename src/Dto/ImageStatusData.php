<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use InvalidArgumentException;

class ImageStatusData
{
    public function __construct(
        public string $file,
        public ?string $caption = null,
    ) {
        $this->validateImage($this->file);
    }

    public function toArray(): array
    {
        $isUrl = filter_var($this->file, FILTER_VALIDATE_URL) !== false;

        $fileData = [
            'mimetype' => $this->getMimeType($this->file),
        ];

        if ($isUrl) {
            $fileData['url'] = $this->file;
        } else {
            $fileData['data'] = $this->file;
        }

        $array = [
            'file' => $fileData,
        ];

        if ($this->caption !== null) {
            $array['caption'] = $this->caption;
        }

        return $array;
    }

    private function validateImage(string $file): void
    {
        $mimeType = $this->getMimeType($file);

        if (! str_starts_with($mimeType, 'image/')) {
            throw new InvalidArgumentException(message: 'The file must be an image.');
        }
    }

    private function getMimeType(string $file): string
    {
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $extension = pathinfo(parse_url($file, PHP_URL_PATH), PATHINFO_EXTENSION);
            return $this->getMimeFromExtension($extension);
        }

        // Base64 detection
        if (preg_match('/^data:(image\/[a-z0-9.-]+);base64,/', $file, $matches)) {
            return $matches[1];
        }

        // If it's just raw base64 data, we try to detect by decoding a small portion
        $data = base64_decode(mb_substr($file, 0, 128), true);
        if ($data !== false) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_buffer($finfo, $data);
            finfo_close($finfo);
            return $mimeType;
        }

        return 'application/octet-stream';
    }

    private function getMimeFromExtension(string $extension): string
    {
        $mimes = [
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png'  => 'image/png',
            'gif'  => 'image/gif',
            'webp' => 'image/webp',
            'bmp'  => 'image/bmp',
            'svg'  => 'image/svg+xml',
        ];

        return $mimes[mb_strtolower($extension)] ?? 'application/octet-stream';
    }
}
