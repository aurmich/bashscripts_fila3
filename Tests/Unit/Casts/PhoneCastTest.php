<?php

namespace Tests\Unit\Modules\Xot\Casts;

use Modules\Xot\Casts\PhoneCast;
use Tests\TestCase;

/**
 * Class PhoneCastTest.
 *
 * @covers \Modules\Xot\Casts\PhoneCast
 */
final class PhoneCastTest extends TestCase
{
    private PhoneCast $phoneCast;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->phoneCast = new PhoneCast();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->phoneCast);
    }

    public function testGet(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSet(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
