<?php


namespace Oil\Patterns;


use Oil\Engine\EngineInterface;

class SinglePipe implements EngineInterface
{
    public function start($payload, array $stages)
    {
        if ($stages === []) {
            return $payload;
        }

        $payload = call_user_func (  $stages[0] ,$payload );

        return $payload;
    }

}
