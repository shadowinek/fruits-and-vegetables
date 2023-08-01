<?php

namespace App\Collection;

use App\Enum\MeasurementUnit;
use App\Enum\ProduceType;
use App\Model\ProduceInterface;

class ProduceCollection implements CollectionInterface
{
    /**
     * @var ProduceInterface[]
     */
    protected array $list = [];

    protected MeasurementUnit $unit = MeasurementUnit::GRAM;

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

    public function setUnit(MeasurementUnit $unit): void
    {
        $this->unit = $unit;

        foreach ($this->list as $item) {
            $oldUnit = $item->getUnit();
            $oldQuantity = $item->getQuantity();

            if ($oldUnit !== $unit) {
                $item->setUnit($unit);

                switch ($unit) {
                    case MeasurementUnit::GRAM:
                        $newQuantity = $oldQuantity * MeasurementUnit::KILOGRAM->getMultiplier();
                        break;
                    case MeasurementUnit::KILOGRAM:
                        $newQuantity = $oldQuantity / MeasurementUnit::KILOGRAM->getMultiplier();
                        break;
                }

                $item->setQuantity($newQuantity);
            }
        }
    }

    public function getUnit(): MeasurementUnit
    {
        return $this->unit;
    }
}
