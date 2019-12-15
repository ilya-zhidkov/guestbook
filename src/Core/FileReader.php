<?php

namespace GuestBook\Core;

interface FileReader
{
    public function read(string $fileName);
}
