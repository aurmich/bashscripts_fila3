<?php

namespace Tests\Unit\Modules\Xot\Services;

use Modules\Xot\Services\FactoryService;
use Tests\TestCase;

/**
 * Class FactoryServiceTest.
 *
 * @covers \Modules\Xot\Services\FactoryService
 */
final class FactoryServiceTest extends TestCase
{
    private FactoryService $factoryService;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->factoryService = new FactoryService();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->factoryService);
    }

    public function testNewFactory(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
