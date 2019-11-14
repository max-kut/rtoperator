<?php

namespace Rtoperator\Entities;

/**
 * Class Discount
 *
 * @property string $type_name
 * @property string $type_title
 * @property float $sum_for_insider
 * @property float $sum_for_foreigner
 * @property int $service_id
 */
class Discount extends AbstractEntity
{
    protected $casts = [
        'type_name'         => 'string',
        'type_title'        => 'string',
        'sum_for_insider'   => 'float',
        'sum_for_foreigner' => 'float',
        'service_id'        => 'int',
    ];
}
