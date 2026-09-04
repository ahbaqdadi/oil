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

    protected function setUp(): void
    {
        $this->singlePip = new \Oil\Patterns\SinglePipe();
    }


    public function test_is_singlePipe_work()
    {
        $singlePipe = $this->singlePip;

        $testclass = new testSinglePipe();

        $this->assertSame('test', $singlePipe->start('test', [$testclass]));

    }
}
