<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use NjoguAmos\Waha\Dto\ContactExistsData;
use NjoguAmos\Waha\Requests\Contacts\CheckExistsRequest;

class Contacts extends Waha
{
    public function checkExists(string $phone, ?string $session = null): ContactExistsData
    {
        $response = $this->connector->send(
            request: new CheckExistsRequest(
                phone: $phone,
                session: $session,
            )
        );

        return $response->dtoOrFail();
    }
}
