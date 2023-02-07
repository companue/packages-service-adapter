<?php

namespace Companue\ServiceAdapter\Tests\Unit;

use Companue\ServiceAdapter\Facades\ServiceAdapter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Companue\ServiceAdapter\Tests\TestCase;

class UnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_returns_ok()
    {
        $this->assertEquals('OK', ServiceAdapter::installed());
    }
}
