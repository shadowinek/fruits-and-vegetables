<?php

namespace App\Collection;

use App\Enum\ProduceType;
use App\Model\ProduceInterface;

abstract class AbstractProduceCollection implements CollectionInterface
{
    /**
     * @var ProduceInterface[]
     */
    protected array $list;

    public function add(ProduceInterface $produce): void
    {
        // TODO: Implement add() method.
    }

    public function remove(ProduceInterface $produce): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @return ProduceInterface[]
     */
    public function list(): array
    {
        return $this->list;
    }

    abstract public function getType(): ProduceType;
}
