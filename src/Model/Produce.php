<?php

namespace App\Model;

use App\Enum\ProduceType;
class Produce implements ProduceInterface
{
    public function __construct(
        protected readonly int $id,
        protected readonly string $name,
        protected readonly int $quantity,
        protected readonly ProduceType $type
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

    // todo: add conversion to kg
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getType(): ProduceType
    {
        return $this->type;
    }
}
