<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Country;

class CountryCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($country){
            return Country::make($country);
        });
    }
}
