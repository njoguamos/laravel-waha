<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionProxyData
{
    public function __construct(
        public string $server,
        public ?string $username = null,
        public ?string $password = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            server: $data['server'],
            username: $data['username'] ?? null,
            password: $data['password'] ?? null,
        );
    }

    public function toArray(): array
    {
        $array = [
            'server' => $this->server,
        ];

        if ($this->username !== null) {
            $array['username'] = $this->username;
        }

        if ($this->password !== null) {
            $array['password'] = $this->password;
        }

        return $array;
    }
}
