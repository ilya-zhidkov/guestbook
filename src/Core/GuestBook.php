<?php

namespace GuestBook\Core;

use GuestBook\Core\Actions\{Action, ActionType, ReadAction, LeaveAction, WriteAction};
use GuestBook\Core\Models\{File, User};

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
            case ActionType::WRITE:
                $this->addAction(new WriteAction($this->file), 'write');            
                break;
            case ActionType::READ:
                $this->addAction(new ReadAction($this->file), 'read');
                break;
            default:
                $this->addAction(new LeaveAction(), 'leave');
                break;
        }

        foreach ($this->actions as $action)
            $action->execute(new User('Admin'));
    }

    private function addAction(Action $action, string $key)
    {
        $this->actions[$key] = $action;
    }
}
