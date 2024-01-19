<?php

namespace Tests\Unit\Modules\Xot\Exceptions;

use Modules\Xot\Exceptions\ApplicationError;
use Tests\TestCase;

/**
 * Class licationErrorTest.
 *
 * @covers \Modules\Xot\Exceptions\ApplicationError
 */
final class licationErrorTest extends TestCase
{
    private ApplicationError $applicationError;

    private string $help;

    private string $error;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->help = '42';
        $this->error = '42';
        $this->applicationError = new ApplicationError($this->help, $this->error);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->applicationError);
        unset($this->help);
        unset($this->error);
    }

    public function testToArray(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testJsonSerialize(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testToJson(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
