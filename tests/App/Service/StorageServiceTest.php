<?php

namespace App\Tests\App\Service;

use App\Enum\ProduceType;
use App\Service\StorageService;
use PHPUnit\Framework\TestCase;

class StorageServiceTest extends TestCase
{
    protected StorageService $storageService;

    public function setUp(): void
    {
        $request = file_get_contents('request.json');

        $this->storageService = new StorageService($request);
    }

    public function testReceivingRequest(): void
    {
        $this->assertNotEmpty($this->storageService->getRequest());
        $this->assertIsString($this->storageService->getRequest());
    }

    public function testCollectionInitialization(): void
    {
        $collections = $this->storageService->getCollections();

        $this->assertNotEmpty($collections);
        $this->assertArrayHasKey(ProduceType::FRUIT->value, $collections);
        $this->assertArrayHasKey(ProduceType::VEGETABLE->value, $collections);
    }

    public function testParsing(): void
    {
        $this->storageService->parseRequest();

        $collections = $this->storageService->getCollections();

        $this->assertSame($collections[ProduceType::FRUIT->value]->count(), 10);
        $this->assertSame($collections[ProduceType::VEGETABLE->value]->count(), 10);
    }
}
