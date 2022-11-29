<?php

namespace Companue\PackageSkeleton\Facades;

use Illuminate\Support\Facades\Facade;

class PackageSkeleton extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'package-skeleton';
    }
}
