<?php

namespace Companue\PackageSkeleton\Tests\Unit;

use Companue\PackageSkeleton\Facades\PackageSkeleton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Companue\PackageSkeleton\Tests\TestCase;

class UnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_returns_ok()
    {
        $this->assertEquals('OK', PackageSkeleton::installed());
    }
}
