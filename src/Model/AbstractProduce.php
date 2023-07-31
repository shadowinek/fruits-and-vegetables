<?php

namespace App\Model;

abstract class AbstractProduce implements ProduceInterface
{
    public function __construct(
        protected readonly int $id,
        protected readonly string $name,
        protected readonly int $quantity
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
}
