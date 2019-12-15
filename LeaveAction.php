<?php

require_once 'Action.php';
require_once 'User.php';

class LeaveAction implements Action
{
    public function execute(User $user)
    {
        exit("\nSigning {$user->toString()} out...\n");
    }
}
