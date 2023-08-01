<?php

namespace App\Model;

use App\Enum\MeasurementUnit;
use App\Enum\ProduceType;

class ProduceFactory
{
    public function create(array $produceData): ProduceInterface {
        return new Produce(
            $produceData['id'],
            $produceData['name'],
            ProduceType::from($produceData['type']),
            $this->getQuantityInGrams($produceData['quantity'], MeasurementUnit::from($produceData['unit'])),
            MeasurementUnit::GRAM
        );
    }

    protected function getQuantityInGrams(int $quantity, MeasurementUnit $unit): int
    {
        return $quantity * $unit->getMultiplier();
    }
}
