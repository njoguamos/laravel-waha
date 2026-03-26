<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageLocationData
{
    public function __construct(
        public string $chatId,
        public float $latitude,
        public float $longitude,
        public string $title,
        public ?string $reply_to = null,
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'chatId'    => $this->chatId,
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
            'title'     => $this->title,
        ];

        if ($this->reply_to !== null) {
            $array['reply_to'] = $this->reply_to;
        }

        return $array;
    }
}
