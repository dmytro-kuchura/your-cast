<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function initDatabase(): void
    {
        Artisan::call('migrate');
    }

    protected function resetDatabase(): void
    {
        Artisan::call('migrate:reset');
    }
}
