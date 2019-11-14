<?php

namespace Rtoperator\Entities;

use Rtoperator\Data\DatesCollection;
use Rtoperator\Data\ServicesCollection;

/**
 * Class Tour
 *
 * @property int $tour_id
 * @property int $country_id
 * @property int $category_id
 * @property string $title
 * @property string $days
 * @property string $cities
 * @property string $htmlCode
 * @property string $htmlCode2
 * @property \DateTimeInterface $datetime_updated
 * @property array $images
 * @property \Rtoperator\Data\DatesCollection|\Rtoperator\Entities\Date[] $dates
 * @property \Rtoperator\Data\ServicesCollection|\Rtoperator\Entities\Service[] $services
 */
class Tour extends AbstractEntity
{
    protected $attributes = [
        'images' => [],
    ];

    protected $casts = [
        'tour_id'          => 'int',
        'country_id'       => 'int',
        'category_id'      => 'int',
        'title'            => 'string',
        'days'             => 'string',
        'cities'           => 'string',
        'htmlCode'         => 'string',
        'htmlCode2'        => 'string',
        'datetime_updated' => 'datetime',
    ];

    /**
     * @param $value
     */
    protected function setTitleAttribute($value)
    {
        if (preg_match('/^\s*<font[^>]*>(.+)<\/font>\s*$/i', $value, $matches)) {
            $this->attributes['title'] = trim($matches[1]);
        } else {
            $this->attributes['title'] = trim($value);
        }
    }

    /**
     * @param $value
     */
    protected function setImagesAttribute(array $value)
    {
        $this->attributes['images'] = array_values(array_filter(array_map(function ($img) {
            if (is_object($img) || is_array($img)) {
                return data_get($img, 'image');
            } else if (is_string($img)) {
                return str_replace('/thumbs/', '/images/', $img);
            }
        }, $value)));
    }

    /**
     * @param $value
     * @return \Rtoperator\Data\DatesCollection
     */
    protected function getDatesAttribute($value)
    {
        return $value instanceof DatesCollection ? $value : DatesCollection::make($value);
    }

    /**
     * @param $value
     */
    protected function setDatesAttribute($value)
    {
        if ($value instanceof DatesCollection) {
            $this->attributes['dates'] = $value;
        } else if (is_array($value)) {
            $this->attributes['dates'] = DatesCollection::make($value);
        }
    }

    /**
     * @param $value
     * @return \Rtoperator\Data\ServicesCollection
     */
    protected function getServicesAttribute($value)
    {
        return $value instanceof ServicesCollection ? $value : ServicesCollection::make($value);
    }

    /**
     * @param $value
     */
    protected function setServicesAttribute($value)
    {
        if ($value instanceof ServicesCollection) {
            $this->attributes['services'] = $value;
        } else if (is_array($value)) {
            $this->attributes['services'] = ServicesCollection::make($value);
        }
    }
}
