<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

enum FileType: string
{
    case JPG = 'jpg';
    case JPEG = 'jpeg';
    case PNG = 'png';
    case GIF = 'gif';
    case WEBP = 'webp';
    case BMP = 'bmp';
    case SVG = 'svg';
    case PDF = 'pdf';
    case MP4 = 'mp4';
    case MP3 = 'mp3';
    case MPEG = 'mpeg';
    case OGG = 'ogg';
    case OPUS = 'opus';
    case WEBM = 'webm';
    case ZIP = 'zip';
    case TXT = 'txt';
    case JSON = 'json';
    case DOC = 'doc';
    case DOCX = 'docx';
    case XLS = 'xls';
    case XLSX = 'xlsx';
    case PPT = 'ppt';
    case PPTX = 'pptx';
    case OCTET_STREAM = 'bin';

    public function mime(): string
    {
        return match ($this) {
            self::JPG, self::JPEG => 'image/jpeg',
            self::PNG          => 'image/png',
            self::GIF          => 'image/gif',
            self::WEBP         => 'image/webp',
            self::BMP          => 'image/bmp',
            self::SVG          => 'image/svg+xml',
            self::PDF          => 'application/pdf',
            self::MP4          => 'video/mp4',
            self::MP3          => 'audio/mpeg',
            self::MPEG         => 'video/mpeg',
            self::OGG          => 'audio/ogg',
            self::OPUS         => 'audio/opus',
            self::WEBM         => 'video/webm',
            self::ZIP          => 'application/zip',
            self::TXT          => 'text/plain',
            self::JSON         => 'application/json',
            self::DOC          => 'application/msword',
            self::DOCX         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            self::XLS          => 'application/vnd.ms-excel',
            self::XLSX         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            self::PPT          => 'application/vnd.ms-powerpoint',
            self::PPTX         => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            self::OCTET_STREAM => 'application/octet-stream',
        };
    }
}
