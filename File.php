<?php

require_once 'FileReader.php';
require_once 'FileWriter.php';

class File implements FileReader, FileWriter
{
    public $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function read(string $fileName)
    {
        return file_get_contents($fileName);
    }

    public function write(string $fileName, $data)
    {
        file_put_contents($fileName, $data);
    }
}
