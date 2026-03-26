<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class PollData
{
    public function __construct(
        public string $name,
        public array $options,
        public bool $multipleAnswers = false,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name'            => $this->name,
            'options'         => $this->options,
            'multipleAnswers' => $this->multipleAnswers,
        ];
    }
}
