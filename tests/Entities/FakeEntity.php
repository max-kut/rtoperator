<?php

namespace Tests\Entities;

use Rtoperator\Entities\AbstractEntity;

class FakeEntity extends AbstractEntity
{
    protected $attributes = [
        'not_cast' => null
    ];

    protected $casts = [
        'int'        => 'int',
        'integer'    => 'integer',
        'float'      => 'float',
        'bool'       => 'bool',
        'boolean'    => 'boolean',
        'string'     => 'string',
        'object'     => 'object',
        'array'      => 'array',
        'collection' => 'collection',
        'decimal'    => 'decimal:6,2',
        'date'       => 'date',
        'datetime'   => 'datetime',
        'timestamp'  => 'timestamp',
    ];

    protected function getTestAccessorAttribute($value)
    {
        return 'test_accessor';
    }
}