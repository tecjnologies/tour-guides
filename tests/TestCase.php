<?php

namespace Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;
}
