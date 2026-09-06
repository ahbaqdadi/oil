<?php


namespace Oil;

use Oil\Engine\EngineInterface;
use Oil\Storage\ArrayStream;

class OilService
{
    /**
     * @var EngineInterface
     */
    private $engine;

    /**
     * @var ArrayStream
     */
    private $arrayStream;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
        $this->arrayStream = new ArrayStream();
    }

    /**
     * add action
     * @param $item
     */
    public function add($item)
    {
        $this->arrayStream->addArray($item);
    }

    /**
     * run the actions
     * @param $payload
     */
    public function run($payload)
    {
        try {
            return $this->engine->start($payload,$this->arrayStream->getArray());
        } finally {
            $this->arrayStream->clearArray();
        }
    }
}
