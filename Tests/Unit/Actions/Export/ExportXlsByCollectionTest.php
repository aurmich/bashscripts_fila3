<?php

namespace Modules\Xot\Tests\Unit\Actions\Export;

use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Tests\TestCase;

/**
 * Class ExportXlsByCollectionTest.
 *
 * @covers \Modules\Xot\Actions\Export\ExportXlsByCollection
 */
final class ExportXlsByCollectionTest extends TestCase
{
    private ExportXlsByCollection $exportXlsByCollection;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->exportXlsByCollection = new ExportXlsByCollection();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->exportXlsByCollection);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
