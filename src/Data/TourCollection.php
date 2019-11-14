<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Tour;

class TourCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($tour){
            return Tour::make($tour);
        });
    }
}
