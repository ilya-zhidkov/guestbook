<?php

namespace GuestBook\Core\Actions;

use GuestBook\Core\Models\{File, User};

class ReadAction implements Action
{
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute(User $user)
    {
        echo PHP_EOL . $this->file->read($this->file->path) . PHP_EOL;
    }
}
