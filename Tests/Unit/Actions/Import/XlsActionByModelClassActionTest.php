<?php

namespace Modules\Xot\Tests\Unit\Actions\Import;

use Modules\Xot\Actions\Import\XlsActionByModelClassAction;
use Tests\TestCase;

/**
 * Class XlsActionByModelClassActionTest.
 *
 * @covers \Modules\Xot\Actions\Import\XlsActionByModelClassAction
 */
final class XlsActionByModelClassActionTest extends TestCase
{
    private XlsActionByModelClassAction $xlsActionByModelClassAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->xlsActionByModelClassAction = new XlsActionByModelClassAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->xlsActionByModelClassAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
