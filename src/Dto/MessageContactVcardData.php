<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class MessageContactVcardData
{
    /**
     * @param  VCardContactData[]  $contacts
     */
    public function __construct(
        public string $chatId,
        public array $contacts,
        public ?string $replyTo = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'chatId'   => $this->chatId,
            'contacts' => array_map(static fn (VCardContactData $contact) => $contact->toArray(), $this->contacts),
            'reply_to' => $this->replyTo,
        ];
    }
}
