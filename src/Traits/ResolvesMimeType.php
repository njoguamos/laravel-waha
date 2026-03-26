<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Traits;

use NjoguAmos\Waha\Enums\FileType;

trait ResolvesMimeType
{
    private function getMimeType(string $file, string|FileType|null $mimetype): string
    {
        if ($mimetype instanceof FileType) {
            return $mimetype->mime();
        }

        if ($mimetype !== null) {
            return $mimetype;
        }

        if (str_starts_with($file, 'http')) {
            $extension = pathinfo(parse_url($file, PHP_URL_PATH), PATHINFO_EXTENSION);

            if ($extension !== '') {
                $type = FileType::tryFrom(mb_strtolower($extension));

                return $type?->mime() ?? 'application/octet-stream';
            }
        }

        if (preg_match('/^data:([^;]+);base64,/', $file, $matches)) {
            return $matches[1];
        }

        if (str_contains($file, 'base64,')) {
            $file = explode('base64,', $file)[1];
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_buffer($finfo, base64_decode($file));
        finfo_close($finfo);

        return $mimeType ?: 'application/octet-stream';
    }

    private function getFilename(string $file, ?string $filename): string
    {
        if ($filename !== null) {
            return $filename;
        }

        if (str_starts_with($file, 'http')) {
            $path = parse_url($file, PHP_URL_PATH);
            $basename = $path ? basename($path) : '';

            if ($basename !== '') {
                return $basename;
            }

            return parse_url($file, PHP_URL_HOST) ?: 'file';
        }

        return 'file';
    }
}
