<?php

namespace Tests\Unit\Modules\Xot\ValueObjects;

use Modules\Xot\ValueObjects\PhoneValueObject;
use Tests\TestCase;

/**
 * Class PhoneValueObjectTest.
 *
 * @covers \Modules\Xot\ValueObjects\PhoneValueObject
 */
final class PhoneValueObjectTest extends TestCase
{
    private PhoneValueObject $phoneValueObject;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->phoneValueObject = new PhoneValueObject();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->phoneValueObject);
    }

    public function testFromString(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testToString(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
