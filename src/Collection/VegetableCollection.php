<?php

namespace App\Collection;

use App\Enum\ProduceType;

class VegetableCollection extends AbstractProduceCollection
{
    public function getType(): ProduceType
    {
        return ProduceType::VEGETABLE;
    }
}
