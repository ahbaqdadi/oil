<?php


class pipe{
    public function __invoke($payload)
    {
        return $payload;
    }
}

class OilServiceTest extends \PHPUnit\Framework\TestCase
{
    public function test_oilService()
    {
        $oilService = new \Oil\OilService(new \Oil\Patterns\PipeLine());

        $oilService->add(new pipe());

        $this->assertSame('test', $oilService->run('test'));
    }

    public function test_stages_are_cleared_after_each_run()
    {
        $oilService = new \Oil\OilService(new \Oil\Patterns\PipeLine());

        $oilService->add(function ($payload) {
            return $payload . '-processed';
        });

        $this->assertSame('test-processed', $oilService->run('test'));
        $this->assertSame('test', $oilService->run('test'));
    }
}
