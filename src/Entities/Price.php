<?php

namespace Rtoperator\Entities;

/**
 * Class Price
 *
 * @property int $tourId
 * @property string $title
 * @property float $sum_for_insider
 * @property float $sum_for_foreigner
 * @property bool $use_season_discount
 * @property int $season_discount_sign
 */
class Price extends AbstractEntity
{
    protected $casts = [
        'tourId'               => 'int',
        'title'                => 'string',
        'sum_for_insider'      => 'float',
        'sum_for_foreigner'    => 'float',
        'use_season_discount'  => 'boolean',
        'season_discount_sign' => 'int'
    ];
}
