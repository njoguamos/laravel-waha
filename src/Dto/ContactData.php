<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class ContactData
{
    public function __construct(
        public ?string $id,
        public ?string $number,
        public ?string $name,
        public ?string $pushname,
        public ?string $shortName,
        public ?bool $isMe,
        public ?bool $isGroup,
        public ?bool $isWAContact,
        public ?bool $isMyContact,
        public ?bool $isBlocked,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id:          $data['id'] ?? null,
            number:      $data['number'] ?? null,
            name:        $data['name'] ?? null,
            pushname:    $data['pushname'] ?? null,
            shortName:   $data['shortName'] ?? null,
            isMe:        $data['isMe'] ?? null,
            isGroup:     $data['isGroup'] ?? null,
            isWAContact: $data['isWAContact'] ?? null,
            isMyContact: $data['isMyContact'] ?? null,
            isBlocked:   $data['isBlocked'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'number'      => $this->number,
            'name'        => $this->name,
            'pushname'    => $this->pushname,
            'shortName'   => $this->shortName,
            'isMe'        => $this->isMe,
            'isGroup'     => $this->isGroup,
            'isWAContact' => $this->isWAContact,
            'isMyContact' => $this->isMyContact,
            'isBlocked'   => $this->isBlocked,
        ];
    }
}
