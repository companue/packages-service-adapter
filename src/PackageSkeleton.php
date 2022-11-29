<?php

namespace Companue\PackageSkeleton;

class PackageSkeleton
{
    function installed()
    {
        return 'OK';
    }

    function version()
    {
        $content = file_get_contents(base_path('composer.json'));
        $content = json_decode($content, true);
        $version = $content["require"]["companue/package-skeleton"];

        return $version;
    }
}
