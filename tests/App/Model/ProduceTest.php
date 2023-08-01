<?php

namespace App\Tests\App\Model;

use App\Enum\ProduceType;
use App\Model\Produce;
use PHPUnit\Framework\TestCase;

class ProduceTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCreate(array $produceData) {
        $produce = new Produce(
            $produceData['id'],
            $produceData['name'],
            $produceData['quantity'],
            ProduceType::from($produceData['type'])
        );

        $this->assertSame($produce->getId(), $produceData['id']);
        $this->assertSame($produce->getName(), $produceData['name']);
        $this->assertSame($produce->getQuantity(), $produceData['quantity']);
        $this->assertSame($produce->getType()->value, $produceData['type']);
    }

    public static function dataProvider() {
        return [
            [[
                "id" => 1,
                "name" => "Carrot",
                "type" => "vegetable",
                "quantity" => 10922,
                "unit" => "g"
            ]],
            [[
                "id" => 2,
                "name" => "Apples",
                "type" => "fruit",
                "quantity" => 20000,
                "unit" => "g"
            ]],
        ];
    }
}
