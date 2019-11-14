<?php

namespace Rtoperator\Data;

use Illuminate\Support\Collection;
use Rtoperator\Entities\Category;

class CategoryCollection extends Collection
{
    public static function make($items = [])
    {
        return parent::make($items)->map(function($category){
            return Category::make($category);
        });
    }
}
