<?php


class ArrayStreamTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Oil\Storage\ArrayStream
     */
    private $arrayStream;

    protected function setUp(): void
    {
        $this->arrayStream = new \Oil\Storage\ArrayStream();
    }


    public function test_item_can_push()
    {
        $this->arrayStream->addArray('item1');

        $this->assertSame(['item1'], $this->arrayStream->getArray());
    }

    public function test_item_can_delete()
    {
        $this->arrayStream->addArray('item1');

        $this->arrayStream->clearArray();

        $this->assertSame([], $this->arrayStream->getArray());
    }

    public function test_fail_item_can_push()
    {
        $this->arrayStream->addArray('item1');

        $this->assertNotSame(['item2'], $this->arrayStream->getArray());
    }

    public function test_fail_item_can_delete()
    {
        $this->arrayStream->addArray('item1');

        $this->arrayStream->clearArray();

        $this->assertNotSame(['item1'], $this->arrayStream->getArray());
    }

}
