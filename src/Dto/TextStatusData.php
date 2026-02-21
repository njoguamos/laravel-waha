<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class TextStatusData
{
    public function __construct(
        public string $text,
        public string $backgroundColor,
        public int $font,
        public ?array $contacts = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            backgroundColor: $data['backgroundColor'],
            font: $data['font'],
            contacts: $data['contacts'] ?? null,
        );
    }

    public function toArray(): array
    {
        $array = [
            'text'            => $this->text,
            'backgroundColor' => $this->backgroundColor,
            'font'            => $this->font,
        ];

        if ($this->contacts !== null) {
            $array['contacts'] = $this->contacts;
        }

        return $array;
    }
}
