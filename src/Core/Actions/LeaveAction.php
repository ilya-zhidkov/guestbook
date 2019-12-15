<?php

namespace GuestBook\Core\Actions;

use GuestBook\Core\Models\User;

class LeaveAction implements Action
{
    public function execute(User $user)
    {
        exit("\nSigning {$user->toString()} out...\n");
    }
}
