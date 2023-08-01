<?php

namespace App\Model;

use App\Enum\MeasurementUnit;
use App\Enum\ProduceType;
class Produce implements ProduceInterface
{
    public function __construct(
        protected readonly int $id,
        protected readonly string $name,
        protected readonly ProduceType $type,
        protected int $quantity,
        protected MeasurementUnit $unit,
    )
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int|float
    {
        return $this->quantity;
    }

    public function getType(): ProduceType
    {
        return $this->type;
    }

    public function setQuantity(float|int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getUnit(): MeasurementUnit
    {
        return $this->unit;
    }

    public function setUnit(MeasurementUnit $unit): void
    {
        $this->unit = $unit;
    }
}
