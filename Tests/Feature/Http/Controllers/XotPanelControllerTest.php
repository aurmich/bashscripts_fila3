<?php

namespace Modules\Xot\Tests\Feature\Http\Controllers;

use Modules\Xot\Http\Controllers\XotPanelController;
use Tests\TestCase;

/**
 * Class XotPanelControllerTest.
 *
 * @covers \Modules\Xot\Http\Controllers\XotPanelController
 */
final class XotPanelControllerTest extends TestCase
{
    private XotPanelController $xotPanelController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->xotPanelController = new XotPanelController();
        $this->app->instance(XotPanelController::class, $this->xotPanelController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->xotPanelController);
    }

    public function test__call(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }
}
