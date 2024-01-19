<?php

namespace Modules\Xot\Tests\Unit\Models\Policies;

use App\User;
use Modules\Xot\Models\Policies\XotBasePolicy;
use Tests\TestCase;

/**
 * Class XotBasePolicyTest.
 *
 * @covers \Modules\Xot\Models\Policies\XotBasePolicy
 */
final class XotBasePolicyTest extends TestCase
{
    private XotBasePolicy $xotBasePolicy;

    private User $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->xotBasePolicy = $this->getMockBuilder(XotBasePolicy::class)
            ->setConstructorArgs([])
            ->getMockForAbstractClass();
        $this->user = new User();
        $this->app->instance(XotBasePolicy::class, $this->xotBasePolicy);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->xotBasePolicy);
        unset($this->user);
    }

    public function testBeforeWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $ability = '42';

        self::assertFalse($this->user->can('before', $ability));
    }

    public function testBeforeWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $ability = '42';

        self::assertTrue($this->user->can('before', $ability));
    }
}
