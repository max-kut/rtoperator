<?php

namespace Rtoperator\Entities;

/**
 * Class Country
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $domainName
 * @property \DateTimeInterface $datetime_updated
 */
class Country extends AbstractEntity
{
    protected $casts = [
        'id'               => 'int',
        'name'             => 'string',
        'title'            => 'string',
        'domainName'       => 'string',
        'catalogTitle'     => 'string',
        'hotelsTitle'      => 'string',
        'searchTitle'      => 'string',
        'datetime_updated' => 'datetime',
    ];
}
