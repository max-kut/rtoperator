<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\CategoryMapItem;

class CategoryMapCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($categoryMap){
            return CategoryMapItem::make($categoryMap);
        });
    }
}
