<?php

namespace App\Model;

use App\Enum\ProduceType;

class Fruit extends AbstractProduce
{
    public function getType(): ProduceType
    {
        return ProduceType::FRUIT;
    }
}
