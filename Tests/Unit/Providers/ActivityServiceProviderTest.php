<?php

namespace Tests\Unit\Modules\Activity\Providers;

use Modules\Activity\Providers\ActivityServiceProvider;
use Tests\TestCase;

/**
 * Class ActivityServiceProviderTest.
 *
 * @covers \Modules\Activity\Providers\ActivityServiceProvider
 */
final class ActivityServiceProviderTest extends TestCase
{
    private ActivityServiceProvider $activityServiceProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->activityServiceProvider = new ActivityServiceProvider();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->activityServiceProvider);
    }

    public function testBootCallback(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRegisterCallback(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
