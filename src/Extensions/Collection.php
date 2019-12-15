<?php

namespace GuestBook\Extensions;

class Collection
{
    private $collection;
    private $size = 0;

    public function __construct($collection) 
    {
        $this->collection = $collection;
        $this->size = count($collection);
    }

    public function sortBy($key, $order = 'asc')
    {
        $sorted = [];

        for ($i = 0; $i < $this->size; $i++) {
            for ($j = $i + 1; $j < $this->size; $j++) {
                if ($order != 'asc') {
                    if ($this->collection[$j][$key] > $this->collection[$i][$key])
                        $this->swap($this->collection[$j], $this->collection[$i]);
                }
                else {
                    if ($this->collection[$j][$key] < $this->collection[$i][$key])
                        $this->swap($this->collection[$j], $this->collection[$i]);
                }
            }
            $sorted[] = $this->collection[$i];
        }

        return $sorted;
    }

    public function map($callback)
    {
        $keys = array_keys($this->collection);
        $values = array_map($callback, $this->collection, $keys);

        return array_combine($keys, $values);
    }

    private function swap(&$a, &$b) 
    {
        $temporary = $a;
        $a = $b;
        $b = $temporary;
    }
}
