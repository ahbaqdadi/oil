<?php


class MediatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var \Oil\Patterns\Mediator
     */
    private $mediator;

    protected function setUp(): void
    {
        $this->mediator = new \Oil\Patterns\Mediator();
    }

    public function test_is_mediator_work()
    {
        $receivedPayload = null;

        $result = $this->mediator->start('payload', [function ($payload) use (&$receivedPayload) {
            $receivedPayload = $payload;
        }]);

        $this->assertNull($result);
        $this->assertSame('payload', $receivedPayload);
    }
}
