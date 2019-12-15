<?php

namespace GuestBook\Core;

use GuestBook\Core\Actions\{Action, ActionType, ReadAction, LeaveAction, WriteAction};
use GuestBook\Core\Models\{File, User};
use GuestBook\Views\UI;

class GuestBook
{
    private $actions = [];
    private $file;
    private $ui;

    public function __construct(UI $ui, File $file)
    {
        $this->file = $file;
        $this->ui = $ui;
    }

    public function run()
    {
        $this->createAction();

        foreach ($this->actions as $action)
            $action->execute(new User('Admin'));
    }

    private function addAction(Action $action, string $key)
    {
        $this->actions[$key] = $action;
    }

    private function createAction()
    {
        $this->ui->displayMenu();
        $input = $this->ui->getUserInput("\nYour choice: ");

        switch ($input) {
            case ActionType::WRITE:
                $this->addAction(new WriteAction($this->file, $this->ui), 'write');
                break;
            case ActionType::READ:
                $this->addAction(new ReadAction($this->file), 'read');
                break;
            default:
                $this->addAction(new LeaveAction(), 'leave');
                break;
        }
    }
}
