<?php


namespace Oil\Patterns;


use Oil\Engine\EngineInterface;

class PipeLine implements EngineInterface
{
    public function start($payload,array $stages)
    {
        foreach ($stages as $stage) {
            $payload = call_user_func (  $stage ,$payload );
        }

        return $payload;
    }
}