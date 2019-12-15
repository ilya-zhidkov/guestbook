<?php

require_once 'User.php';

interface Action
{
    public function execute(User $user);
}
