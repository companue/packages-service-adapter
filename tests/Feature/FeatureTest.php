<?php

namespace Companue\PackageSkeleton\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Companue\PackageSkeleton\Tests\TestCase;

class FeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_do_somthing()
    {
        $this->assertTrue(true);
    }
}
