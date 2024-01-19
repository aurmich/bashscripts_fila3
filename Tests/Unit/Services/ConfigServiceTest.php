<?php

namespace Tests\Unit\Modules\Xot\Services;

use ConfigService as ConfigServiceAlias;
use Mockery;
use Modules\Xot\Services\ConfigService;
use ReflectionClass;
use Tests\TestCase;

/**
 * Class ConfigServiceTest.
 *
 * @covers \Modules\Xot\Services\ConfigService
 */
final class ConfigServiceTest extends TestCase
{
    private ConfigService $configService;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->configService = new ConfigService();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->configService);
    }

    public function testGetInstance(): void
    {
        $expected = Mockery::mock(ConfigServiceAlias::class);
        $property = (new ReflectionClass(ConfigService::class))
            ->getProperty('instance');
        $property->setValue(null, $expected);
        self::assertSame($expected, ConfigService::getInstance());
    }

    public function testMake(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
