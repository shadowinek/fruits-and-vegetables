<?php

namespace App\Collection;

use App\Enum\ProduceType;
use App\Model\ProduceInterface;

class ProduceCollection implements CollectionInterface
{
    /**
     * @var ProduceInterface[]
     */
    protected array $list = [];

    public function __construct(protected readonly ProduceType $type)
    {}

    public function add(ProduceInterface $produce): void
    {
        $this->list[$produce->getId()] = $produce;
    }

    public function remove(ProduceInterface $produce): void
    {
        if (isset($this->list[$produce->getId()])) {
            unset($this->list[$produce->getId()]);
        }
    }

    /**
     * @return ProduceInterface[]
     */
    public function list(): array
    {
        return $this->list;
    }

    public function getType(): ProduceType
    {
        return $this->type;
    }

    public function count(): int
    {
        return count($this->list);
    }
}
