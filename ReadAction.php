<?php

require_once 'Action.php';
require_once 'File.php';
require_once 'User.php';

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
