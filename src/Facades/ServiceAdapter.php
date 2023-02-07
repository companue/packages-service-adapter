<?php

namespace Companue\ServiceAdapter\Facades;

use Illuminate\Support\Facades\Facade;

class ServiceAdapter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'service-adapter';
    }
}
