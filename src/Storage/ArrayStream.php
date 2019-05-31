<?php


namespace Oil\Storage;


class ArrayStream
{
    /**
     * @var array
     */
    private $array=[];

    /**
     * insert item to array (record actions )
     * @param $item
     */
    public function addArray($item)
    {
        $this->array[] = $item;
    }

    /**
     * return array ( actions )
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * delete items in array (delete actions )
     */
    public function clearArray()
    {
        $this->array = [];
    }
}