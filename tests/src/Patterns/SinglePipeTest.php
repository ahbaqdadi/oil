<?php



class testSinglePipe
{
    public function __invoke($payload)
    {
        return $payload;
    }
}

class SinglePipeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Oil\Patterns\SinglePipe
     */
    private $singlePip;

    public function setUp()
    {
        $this->singlePip = new \Oil\Patterns\SinglePipe();
    }


    public function test_is_singlePipe_work()
    {
        $singlePipe = $this->singlePip;

        $testclass = new testSinglePipe();

        $this->assertEquals($singlePipe->start('test',[$testclass]),'test');

    }
}