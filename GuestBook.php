<?php

require_once 'Action.php';
require_once 'File.php';
require_once 'User.php';
require_once 'WriteAction.php';

class GuestBook
{
    private $file;
    private $actions = [];

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function run()
    {
        echo "\nGuestBook\n";
        echo "**************************\n";
        echo "\nChoose one of the options\n";
        echo "--------------------------\n";
        echo "1. Create a new record.\n";
        echo "2. Read existing records.\n";
        echo "3. Leave.\n";

        $input = readline("\nYour choice: ");

        switch ($input) {
            case '1':
                $this->addAction(new WriteAction($this->file), 'write');            
                break;
            default:
                exit("\nQuitting application...\n");
        }

        foreach ($this->actions as $action)
            $action->execute(new User('Admin'));
    }

    private function addAction(Action $action, string $key)
    {
        $this->actions[$key] = $action;
    }
}
