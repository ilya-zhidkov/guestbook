<?php

namespace GuestBook\Core;

interface FileWriter
{
    public function write(string $fileName, $data);
}
