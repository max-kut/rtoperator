<?php

namespace Rtoperator\Entities;

/**
 * Class Price
 *
 * @property int $tourId
 * @property string $title
 * @property float $sum_for_insider
 * @property float $sum_for_foreigner
 */
class Price extends AbstractEntity
{
    protected $casts = [
        'tourId' => 'int',
        'title' => 'string',
        'sum_for_insider' => 'float',
        'sum_for_foreigner' => 'float',
    ];
}
