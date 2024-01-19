<?php

namespace Tests\Unit\Modules\Xot\Transformers;

use Modules\Xot\Transformers\GeoJsonResource;
use Tests\TestCase;

/**
 * Class GeoJsonResourceTest.
 *
 * @covers \Modules\Xot\Transformers\GeoJsonResource
 */
final class GeoJsonResourceTest extends TestCase
{
    private GeoJsonResource $geoJsonResource;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->geoJsonResource = new GeoJsonResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->geoJsonResource);
    }

    public function testToArray(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
