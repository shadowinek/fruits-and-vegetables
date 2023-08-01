<?php

namespace App\Model;

use App\Enum\MeasurementUnit;
use App\Enum\ProduceType;

interface ProduceInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getQuantity(): int|float;
    public function setQuantity(int|float $quantity): void;
    public function getType(): ProduceType;
    public function getUnit(): MeasurementUnit;
    public function setUnit(MeasurementUnit $unit): void;
}
