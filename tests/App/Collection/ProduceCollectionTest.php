<?php

namespace App\Tests\App\Collection;

use App\Collection\CollectionInterface;
use App\Collection\ProduceCollection;
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
            10000,
            ProduceType::FRUIT
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
    }
}
