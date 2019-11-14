<?php

namespace Rtoperator\Entities;

use Rtoperator\Data\DiscountCollection;

/**
 * Class Service
 *
 * @property int $service_id
 * @property int $tour_id
 * @property int $hotel_id
 * @property string $title
 * @property float $price_for_insider
 * @property float $price_for_foreigner
 */
class Service extends AbstractEntity
{
    protected $casts = [
        'service_id'          => 'int',
        'tour_id'             => 'int',
        'hotel_id'            => 'int',
        'title'               => 'string',
        'price_for_insider'   => 'float',
        'price_for_foreigner' => 'float',
    ];
    
    /**
     * @param $value
     * @return \Rtoperator\Data\DiscountCollection
     */
    protected function getDiscountAttribute($value)
    {
        return DiscountCollection::make($value);
    }
    
    /**
     * @param $value
     */
    protected function setDiscountAttribute($value)
    {
        if($value instanceof DiscountCollection){
            $this->attributes['discount'] = $value;
        } else if(is_array($value)){
            $this->attributes['discount'] = DiscountCollection::make($value);
        }
    }
}
