<?php

namespace Modules\Xot\Tests\Unit\Http\Middleware;

use Modules\Xot\Http\Middleware\SetDefaultTenantForUrlsMiddleware;
use Tests\TestCase;

/**
 * Class SetDefaultTenantForUrlsMiddlewareTest.
 *
 * @covers \Modules\Xot\Http\Middleware\SetDefaultTenantForUrlsMiddleware
 */
final class SetDefaultTenantForUrlsMiddlewareTest extends TestCase
{
    private SetDefaultTenantForUrlsMiddleware $setDefaultTenantForUrlsMiddleware;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->setDefaultTenantForUrlsMiddleware = new SetDefaultTenantForUrlsMiddleware();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->setDefaultTenantForUrlsMiddleware);
    }

    public function testHandle(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
