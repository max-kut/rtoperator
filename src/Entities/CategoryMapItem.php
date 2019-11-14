<?php

namespace Rtoperator\Entities;

/**
 * Class CategoryMapItem
 *
 * @property int $id
 * @property array $children
 */
class CategoryMapItem extends AbstractEntity
{
    protected $attributes = [
        'children' => []
    ];
    protected $casts = [
        'id' => 'int'
    ];
    
    /**
     * @param $value
     * @return array
     */
    protected function getChildrenAttribute($value)
    {
        return array_values(array_filter(array_map('intval', explode(',', $value))));
    }
    
    /**
     * @param $value
     */
    protected function setChildrenAttribute($value)
    {
        if(is_string($value)){
            $this->attributes['children'] = $value;
        } elseif(is_array($value)){
            $this->attributes['children'] = implode(',', $value);
        }
    }
}
