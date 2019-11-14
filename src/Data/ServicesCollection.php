<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Service;

class ServicesCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($service){
            return Service::make($service);
        });
    }
}
