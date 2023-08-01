<?php

namespace App\Service;

use App\Collection\CollectionInterface;
use App\Collection\ProduceCollection;
use App\Enum\ProduceType;
use App\Model\ProduceFactory;

class StorageService
{
    protected string $request = '';

    /**
     * @var CollectionInterface[]
     */
    protected array $collections;

    protected ProduceFactory $factory;

    public function __construct(
        string $request
    )
    {
        $this->request = $request;

        $this->initFactory();
        $this->initCollections();
    }

    public function getRequest(): string
    {
        return $this->request;
    }


    protected function initFactory(): void
    {
        $this->factory = new ProduceFactory();
    }

    protected function initCollections(): void
    {
        foreach (ProduceType::cases() as $type) {
            $this->collections[$type->value] = new ProduceCollection($type);
        }
    }

    /**
     * @return CollectionInterface[]
     */
    public function getCollections(): array
    {
        return $this->collections;
    }

    public function parseRequest(): void
    {
        $json = json_decode($this->request, true);

        foreach ($json as $entry) {
            $produce = $this->factory->create($entry);

            $this->collections[$produce->getType()->value]->add($produce);
        }
    }
}
