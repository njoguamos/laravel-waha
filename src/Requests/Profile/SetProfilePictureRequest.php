<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Profile;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class SetProfilePictureRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $session,
        protected string $file,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/'.rawurlencode($this->session).'/profile/picture';
    }

    public function defaultBody(): array
    {
        $isUrl = filter_var($this->file, FILTER_VALIDATE_URL) !== false;

        if ($isUrl) {
            return [
                'file' => [
                    'mimetype' => $this->getMimeTypeFromUrl($this->file),
                    'url'      => $this->file,
                ],
            ];
        }

        return [
            'file' => [
                'mimetype' => $this->getMimeTypeFromBase64($this->file),
                'data'     => $this->file,
            ],
        ];
    }

    private function getMimeTypeFromUrl(string $url): string
    {
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);

        $mimes = [
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png'  => 'image/png',
            'gif'  => 'image/gif',
            'webp' => 'image/webp',
        ];

        return $mimes[mb_strtolower($extension)] ?? 'application/octet-stream';
    }

    private function getMimeTypeFromBase64(string $data): string
    {
        if (preg_match('/^data:(image\/[a-z0-9.-]+);base64,/', $data, $matches)) {
            return $matches[1];
        }

        return 'image/jpeg';
    }
}
