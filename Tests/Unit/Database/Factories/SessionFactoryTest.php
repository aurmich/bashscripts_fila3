<?php

namespace Modules\Xot\Tests\Unit\Database\Factories;

use Modules\Xot\Database\Factories\SessionFactory;
use Tests\TestCase;

/**
 * Class SessionFactoryTest.
 *
 * @covers \Modules\Xot\Database\Factories\SessionFactory
 */
final class SessionFactoryTest extends TestCase
{
    private SessionFactory $sessionFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->sessionFactory = new SessionFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->sessionFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
