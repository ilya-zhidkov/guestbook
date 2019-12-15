<?php

require_once 'Action.php';
require_once 'File.php';
require_once 'Message.php';
require_once 'User.php';

class WriteAction implements Action
{
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute(User $user)
    {
        $user = (new User(readline("\nEnter your username: ")))->toString();
        $contents = readline('Enter some text: ');
        $message = (new Message($user, $contents))->toString();

        $this->file->write($this->file->path, $message);
    }
}
