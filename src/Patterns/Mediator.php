<?php


namespace Oil\Patterns;


use Oil\Engine\EngineInterface;

class Mediator implements EngineInterface
{
    public function start($payload,array $stages)
    {
        foreach ($stages as $stage) {
            $stage($payload);
        }
    }
}