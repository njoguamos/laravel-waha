<?php

declare(strict_types=1);

use Saloon\Config;
use NjoguAmos\Waha\Tests\TestCase;
use Saloon\Http\Faking\MockClient;

Config::preventStrayRequests();

uses(TestCase::class)
    ->in('Feature', 'Unit');

uses()
    ->beforeEach(fn () => MockClient::destroyGlobal())
    ->in(__DIR__);

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});
