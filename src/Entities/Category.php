<?php

namespace Rtoperator\Entities;

/**
 * Class Category
 *
 * @property int $category_id
 * @property string $title
 * @property string $html
 * @property \DateTimeInterface $datetime_updated
 * @property int $order
 */
class Category extends AbstractEntity
{
    protected $casts = [
        'category_id'      => 'int',
        'title'            => 'string',
        'datetime_updated' => 'datetime',
        'html'             => 'string',
        'order'            => 'int'
    ];
}
