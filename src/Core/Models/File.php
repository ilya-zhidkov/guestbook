<?php

namespace GuestBook\Core\Models;

use GuestBook\Core;
use GuestBook\Core\{FileReader, FileWriter};


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
