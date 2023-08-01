<?php

namespace App\Tests\App\Collection;

use App\Collection\CollectionInterface;
use App\Collection\ProduceCollection;
use App\Enum\MeasurementUnit;
use App\Enum\ProduceType;
use App\Model\Produce;
use App\Model\ProduceInterface;
use PHPUnit\Framework\TestCase;

class ProduceCollectionTest extends TestCase
{
    protected ProduceInterface $produce;
    protected CollectionInterface $collection;

    public function setUp(): void
    {
        $this->produce = new Produce(
            1,
            'Apples',
            ProduceType::FRUIT,
            10000,
            MeasurementUnit::GRAM
        );

        $this->collection = new ProduceCollection(ProduceType::FRUIT);
    }

    public function testAdd(): void
    {
        $this->assertEmpty($this->collection->list());
        $this->assertSame($this->collection->count(), 0);

        $this->collection->add($this->produce);

        $this->assertNotEmpty($this->collection->list());
        $this->assertSame($this->collection->count(), 1);
    }

    public function testRemove(): void
    {
        $this->assertEmpty($this->collection->list());
        $this->assertSame($this->collection->count(), 0);

        $this->collection->add($this->produce);

        $this->assertNotEmpty($this->collection->list());
        $this->assertSame($this->collection->count(), 1);

        $this->collection->remove($this->produce);

        $this->assertEmpty($this->collection->list());
        $this->assertSame($this->collection->count(), 0);
    }

    public function testList(): void
    {
        $this->assertEmpty($this->collection->list());
        $this->assertSame($this->collection->count(), 0);

        $this->collection->add($this->produce);

        $list = $this->collection->list();
        $produce = current($list);

        $this->assertSame($produce->getId(), 1);
        $this->assertSame($produce->getName(), 'Apples');
        $this->assertSame($produce->getQuantity(), 10000);
        $this->assertSame($produce->getType(), ProduceType::FRUIT);
        $this->assertSame($produce->getUnit(), MeasurementUnit::GRAM);
    }

    public function testMeasurementUnits(): void
    {
        $this->collection->add($this->produce);

        $this->assertSame($this->collection->getUnit(), MeasurementUnit::GRAM);

        $list = $this->collection->list();
        $produce = current($list);

        $this->assertSame($produce->getId(), 1);
        $this->assertSame($produce->getName(), 'Apples');
        $this->assertSame($produce->getQuantity(), 10000);
        $this->assertSame($produce->getType(), ProduceType::FRUIT);
        $this->assertSame($produce->getUnit(), MeasurementUnit::GRAM);

        $this->collection->setUnit(MeasurementUnit::KILOGRAM);

        $this->assertSame($this->collection->getUnit(), MeasurementUnit::KILOGRAM);

        $list = $this->collection->list();
        $produce = current($list);

        $this->assertSame($produce->getId(), 1);
        $this->assertSame($produce->getName(), 'Apples');
        $this->assertSame($produce->getQuantity(), 10);
        $this->assertSame($produce->getType(), ProduceType::FRUIT);
        $this->assertSame($produce->getUnit(), MeasurementUnit::KILOGRAM);

        $this->collection->setUnit(MeasurementUnit::GRAM);

        $this->assertSame($this->collection->getUnit(), MeasurementUnit::GRAM);

        $list = $this->collection->list();
        $produce = current($list);

        $this->assertSame($produce->getId(), 1);
        $this->assertSame($produce->getName(), 'Apples');
        $this->assertSame($produce->getQuantity(), 10000);
        $this->assertSame($produce->getType(), ProduceType::FRUIT);
        $this->assertSame($produce->getUnit(), MeasurementUnit::GRAM);
    }
}
