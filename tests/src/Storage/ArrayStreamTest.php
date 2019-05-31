<?php


class ArrayStreamTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Oil\Storage\ArrayStream
     */
    private $arrayStream;

    public function setUp()
    {
        $this->arrayStream = new \Oil\Storage\ArrayStream();
    }


    public function test_item_can_push()
    {
        $this->arrayStream->addArray('item1');

        $this->assertEquals($this->arrayStream->getArray(),['item1']);
    }

    public function test_item_can_delete()
    {
        $this->arrayStream->addArray('item1');

        $this->arrayStream->clearArray();

        $this->assertEquals($this->arrayStream->getArray(),[]);
    }

    public function test_fail_item_can_push()
    {
        $this->arrayStream->addArray('item1');

        $this->assertNotEquals($this->arrayStream->getArray(),['item2']);
    }

    public function test_fail_item_can_delete()
    {
        $this->arrayStream->addArray('item1');

        $this->arrayStream->clearArray();

        $this->assertNotEquals($this->arrayStream->getArray(),['item1']);
    }

}