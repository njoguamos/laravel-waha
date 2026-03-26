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
        public ?string $replyTo = null,
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

        if ($this->replyTo !== null) {
            $array['reply_to'] = $this->replyTo;
        }

        return $array;
    }
}
