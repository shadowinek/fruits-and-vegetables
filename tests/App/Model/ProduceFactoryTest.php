<?php

namespace App\Tests\App\Model;

use App\Model\ProduceFactory;
use PHPUnit\Framework\TestCase;

class ProduceFactoryTest extends TestCase
{
    protected ProduceFactory $factory;

    public function setUp(): void
    {
        $this->factory = new ProduceFactory();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testCreate(array $produceData, int $quantityInGrams): void
    {
        $produce = $this->factory->create($produceData);

        $this->assertSame($produce->getId(), $produceData['id']);
        $this->assertSame($produce->getName(), $produceData['name']);
        $this->assertSame($produce->getQuantity(), $quantityInGrams);
        $this->assertSame($produce->getType()->value, $produceData['type']);
    }

    public static function dataProvider(): array
    {
        return [
            [
                [
                    "id" => 1,
                    "name" => "Carrot",
                    "type" => "vegetable",
                    "quantity" => 10,
                    "unit" => "kg"
                ],
                10000
            ],
            [
                [
                    "id" => 2,
                    "name" => "Apples",
                    "type" => "fruit",
                    "quantity" => 20,
                    "unit" => "kg"
                ],
                20000
            ],
            [
                [
                    "id" => 3,
                    "name" => "Oranges",
                    "type" => "fruit",
                    "quantity" => 3000,
                    "unit" => "g"
                ],
                3000
            ],
        ];
    }
}
