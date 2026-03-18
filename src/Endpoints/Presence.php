<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Endpoints;

use NjoguAmos\Waha\Waha;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;

class Presence extends Waha
{
    public function set(PresenceData $data, ?string $session = null): Response
    {
        return $this->connector->send(new SetPresenceRequest(
            session: $session ?? $this->session,
            data: $data,
        ));
    }
}
