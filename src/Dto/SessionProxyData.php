<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SessionProxyData
{
    public function __construct(
        public string $server,
        public string $username,
        public string $password,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            server: $data['server'],
            username: $data['username'],
            password: $data['password'],
        );
    }

    public function toArray(): array
    {
        return [
            'server'   => $this->server,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
