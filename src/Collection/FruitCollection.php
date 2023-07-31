<?php

namespace App\Collection;

use App\Enum\ProduceType;

class FruitCollection extends AbstractProduceCollection
{
    public function getType(): ProduceType
    {
        return ProduceType::FRUIT;
    }
}
