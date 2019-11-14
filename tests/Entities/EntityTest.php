<?php

namespace Tests\Entities;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Rtoperator\Exceptions\NotDefinedPropertyException;

class EntityTest extends TestCase
{
    public function testCasts()
    {
        $entity = FakeEntity::make([
            'int'        => '1',
            'integer'    => 'a1',
            'float'      => '256.25',
            'bool'       => '0',
            'boolean'    => true,
            'string'     => 'string',
            'object'     => new \stdClass(),
            'array'      => ['a'=>1,'b'=>3,'c'],
            'collection' => ['a'=>1,'b'=>3,'c'],
            'decimal'    => '256.216413',
            'date'       => '2019-11-11',
            'datetime'   => '2019-11-11 00:00:00',
            'timestamp'  => '13232090313',
        ]);

        $this->assertIsInt($entity->int);
        $this->assertIsInt($entity->integer);
        $this->assertIsFloat($entity->float);
        $this->assertFalse($entity->bool);
        $this->assertTrue($entity->boolean);
        $this->assertIsString($entity->string);
        $this->assertIsObject($entity->object);
        $this->assertIsArray($entity->array);
        $this->assertTrue($entity->collection instanceof Collection && $entity->collection->count() == 3);
        $this->assertTrue($entity->date instanceof \DateTimeInterface);
        $this->assertTrue($entity->datetime instanceof \DateTimeInterface);
        $this->assertIsInt($entity->timestamp);
    }


    public function testNotDefinedProperty()
    {
        try {
            FakeEntity::make([
                'not_default_property' => 'test'
            ]);
            $this->assertTrue(false, NotDefinedPropertyException::class . ' not throw');
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof NotDefinedPropertyException);
        }
    }
}