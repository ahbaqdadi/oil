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

    public function setUp()
    {
        $this->pipeline = new \Oil\Patterns\PipeLine();
    }

    public function test_is_pipeline_work()
    {
        $pipeline = $this->pipeline;

        $testclass = new testPipeline();

        $this->assertEquals($pipeline->start('test',[$testclass]),'test');

    }
}