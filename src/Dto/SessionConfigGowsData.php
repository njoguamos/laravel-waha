<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionConfigGowsData
{
    public function __construct(
        public bool $messages = true,
        public bool $groups = true,
        public bool $chats = true,
        public bool $labels = true,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            messages: $data['storage']['messages'] ?? true,
            groups: $data['storage']['groups'] ?? true,
            chats: $data['storage']['chats'] ?? true,
            labels: $data['storage']['labels'] ?? true,
        );
    }

    public function toArray(): array
    {
        return [
            'storage' => [
                'messages' => $this->messages,
                'groups'   => $this->groups,
                'chats'    => $this->chats,
                'labels'   => $this->labels,
            ],
        ];
    }
}
