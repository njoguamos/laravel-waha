<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class TextStatusData
{
    public function __construct(
        public string $text,
        public ?string $backgroundColor = null,
        public int $font = 1,
        public ?array $contacts = null,
    ) {
        $this->backgroundColor ??= $this->getRandomBackgroundColor();
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

    private function getRandomBackgroundColor(): string
    {
        $colors = [
            '#128c7e',
            '#075e54',
            '#34b7f1',
            '#25d366',
            '#ece5dd',
            '#000000',
            '#74676a',
            '#60d394',
            '#52d1dc',
            '#ff7b9c',
            '#ffb86c',
            '#8be9fd',
            '#bd93f9',
            '#ff79c6',
            '#ff5555',
            '#f1fa8c',
        ];

        return $colors[array_rand($colors)];
    }
}
