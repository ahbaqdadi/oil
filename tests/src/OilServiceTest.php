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

        $this->assertEquals($oilService->run('test'),'test');
    }
}