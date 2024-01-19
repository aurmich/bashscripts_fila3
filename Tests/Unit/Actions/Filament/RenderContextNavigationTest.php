<?php

namespace Modules\Xot\Tests\Unit\Actions\Filament;

use Modules\Xot\Actions\Filament\RenderContextNavigation;
use Tests\TestCase;

/**
 * Class RenderContextNavigationTest.
 *
 * @covers \Modules\Xot\Actions\Filament\RenderContextNavigation
 */
final class RenderContextNavigationTest extends TestCase
{
    private RenderContextNavigation $renderContextNavigation;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->renderContextNavigation = new RenderContextNavigation();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->renderContextNavigation);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
