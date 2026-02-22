<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | WAHA Base URL
    |--------------------------------------------------------------------------
    |
    | Here you may specify the base URL for the WAHA API. All HTTP requests
    | will be sent to this endpoint. You should set this in your .env
    | file using the WAHA_BASE_URL environment variable name.
    |
    */

    'base_url' => env(key: 'WAHA_BASE_URL'),

    /*
    |--------------------------------------------------------------------------
    | WAHA API Key
    |--------------------------------------------------------------------------
    |
    | Here you may specify the API key for authenticating with the WAHA
    | API. This key is required for all authenticated requests. You
    | should set this in your .env using WAHA_API_KEY variable.
    |
    | @see https://waha.devlike.pro/docs/how-to/security/#use-x-api-key-in-http-request
    |
    */

    'api_key' => env(key: 'WAHA_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | WAHA Default Session
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default session for your WAHA API requests. The
    | session represents a WhatsApp account connected to WAHA for sending and
    | receiving messages. You can override this at runtime per request.
    |
    | @see https://waha.devlike.pro/docs/how-to/sessions
    |
    */

    'session' => env(key: 'WAHA_SESSION', default: 'default'),

    /*
    |--------------------------------------------------------------------------
    | WAHA Engine
    |--------------------------------------------------------------------------
    |
    | Here you may specify the engine that powers your WAHA API instance. The
    | engine determines which features are available. Supported values are:
    | WEBJS, NOWEB, or GOWS. Defaults to GOWS for optimal performance.
    |
    | @see https://waha.devlike.pro/docs/how-to/engines/#engines
    |
    */

    'engine' => env(key: 'WAHA_ENGINE', default: \NjoguAmos\Waha\Enums\Engine::GOWS->value),

];
