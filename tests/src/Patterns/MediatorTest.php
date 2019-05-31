<?php


class MediatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var \Oil\Patterns\Mediator
     */
    private $mediator;

    public function setUp()
    {
        $this->mediator = new \Oil\Patterns\Mediator();
    }

    public function test_is_mediator_work()
    {
        $mediator = $this->mediator;

        $this->assertEquals($mediator->start(['payload'],[function($payload){ echo $payload; }]),null);
    }
}