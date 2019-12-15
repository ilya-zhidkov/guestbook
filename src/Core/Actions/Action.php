<?php

namespace GuestBook\Core\Actions;

use GuestBook\Core\Models\User;

interface Action
{
    public function execute(User $user);
}
