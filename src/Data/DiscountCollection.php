<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Discount;

class DiscountCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($discount){
            return Discount::make($discount);
        });
    }
}
