<?php

namespace Rtoperator\Entities;

/**
 * Class Date
 *
 * @property int $date_id
 * @property int $tour_id
 * @property \DateTimeInterface $date_start
 * @property \DateTimeInterface $date_finish
 * @property int $rooms
 * @property int $places
 * @property bool $use_season_discount
 * @property int $rooms_available
 * @property int $places_available
 * @property \DateTimeInterface $datetime_updated
 */
class Date extends AbstractEntity
{
    protected $casts = [
        'date_id'             => 'int',
        'tour_id'             => 'int',
        'date_start'          => 'date',
        'date_finish'         => 'date',
        'rooms'               => 'int',
        'places'              => 'int',
        'use_season_discount' => 'bool',
        'rooms_available'     => 'int',
        'places_available'    => 'int',
        'datetime_updated'    => 'datetime',
    ];
}
