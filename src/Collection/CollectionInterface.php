<?php

namespace App\Collection;

use App\Model\ProduceInterface;

interface CollectionInterface
{
    public function add(ProduceInterface $produce): void;
    public function remove(ProduceInterface $produce): void;
    public function list(): array;
    public function count(): int;
}
