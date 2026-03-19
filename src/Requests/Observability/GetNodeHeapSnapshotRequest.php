<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetNodeHeapSnapshotRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/debug/heapsnapshot';
    }
}
