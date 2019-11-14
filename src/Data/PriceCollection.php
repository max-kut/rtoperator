<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Price;

class PriceCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($price){
            return Price::make($price);
        });
    }
}
