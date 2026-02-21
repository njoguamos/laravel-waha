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
    */

    'api_key' => env(key: 'WAHA_API_KEY'),

];
