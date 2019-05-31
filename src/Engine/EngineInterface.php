<?php


namespace Oil\Engine;


interface EngineInterface
{
    public function start($payload,array $stages);
}