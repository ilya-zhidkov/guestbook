<?php

namespace GuestBook\Core\Actions;

use GuestBook\Core\Models\{Message, File, User};
use GuestBook\Views\UI;

class WriteAction implements Action
{
    private $file;
    private $ui;

    public function __construct(File $file, UI $ui)
    {
        $this->file = $file;
        $this->ui = $ui;
    }

    public function execute(User $user)
    {
        $user = (new User($this->ui->getUserInput("\nEnter your username: ")))->toString();
        $contents = $this->ui->getUserInput('Enter some text: ');
        $message = (new Message($user, $contents))->toString();

        $this->file->write($this->file->path, $message);
    }
}
