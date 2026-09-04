<?php


class testPipeline
{
    public function __invoke($payload)
    {
        return $payload;
    }
}


class PipeLineTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Oil\Patterns\PipeLine
     */
    private $pipeline;

    protected function setUp(): void
    {
        $this->pipeline = new \Oil\Patterns\PipeLine();
    }

    public function test_is_pipeline_work()
    {
        $pipeline = $this->pipeline;

        $testclass = new testPipeline();

        $this->assertSame('test', $pipeline->start('test', [$testclass]));

    }
}
