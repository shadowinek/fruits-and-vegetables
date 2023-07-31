<?php

namespace App\Model;

use App\Enum\ProduceType;

class Vegetable extends AbstractProduce
{
    public function getType(): ProduceType
    {
        return ProduceType::VEGETABLE;
    }
}
