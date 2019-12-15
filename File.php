<?php

require_once 'FileWriter.php';

class File implements FileWriter
{
    public $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function write(string $fileName, $data)
    {
        file_put_contents($fileName, $data);
    }
}
