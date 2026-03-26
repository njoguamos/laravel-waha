<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MediaConvertData
{
    public function __construct(
        public ?string $url = null,
        public ?string $data = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [];

        if ($this->url !== null) {
            $array['url'] = $this->url;
        }

        if ($this->data !== null) {
            $array['data'] = $this->data;
        }

        return $array;
    }
}
