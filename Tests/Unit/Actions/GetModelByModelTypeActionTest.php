<?php

namespace Tests\Unit\Modules\Xot\Actions;

use Modules\Xot\Actions\GetModelByModelTypeAction;
use Tests\TestCase;

/**
 * Class GetModelByModelTypeActionTest.
 *
 * @covers \Modules\Xot\Actions\GetModelByModelTypeAction
 */
final class GetModelByModelTypeActionTest extends TestCase
{
    private GetModelByModelTypeAction $getModelByModelTypeAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getModelByModelTypeAction = new GetModelByModelTypeAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getModelByModelTypeAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
