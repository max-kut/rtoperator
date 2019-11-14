<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Date;

class DatesCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($date){
            return Date::make($date);
        });
    }
}
