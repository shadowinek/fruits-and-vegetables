<?php

namespace App\Model;

use App\Enum\ProduceType;

interface ProduceInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getQuantity(): int;
    public function getType(): ProduceType;
}
