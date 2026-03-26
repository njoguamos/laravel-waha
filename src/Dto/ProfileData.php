<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ProfileData
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $picture = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id:      $data['id'],
            name:    $data['name'],
            picture: $data['picture'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'picture' => $this->picture,
        ];
    }
}
