<?php

namespace Tests\Unit\Modules\Xot\Services;

use CSVService as CSVServiceAlias;
use Mockery;
use Modules\Xot\Services\CSVService;
use ReflectionClass;
use Tests\TestCase;

/**
 * Class CSVServiceTest.
 *
 * @covers \Modules\Xot\Services\CSVService
 */
final class CSVServiceTest extends TestCase
{
    private CSVService $cSVService;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->cSVService = new CSVService();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->cSVService);
    }

    public function testGetInstance(): void
    {
        $expected = Mockery::mock(CSVServiceAlias::class);
        $property = (new ReflectionClass(CSVService::class))
            ->getProperty('instance');
        $property->setValue(null, $expected);
        self::assertSame($expected, CSVService::getInstance());
    }

    public function testMake(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testToArray(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
