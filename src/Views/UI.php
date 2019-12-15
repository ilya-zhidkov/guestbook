<?php

namespace GuestBook\Views;

interface UI
{
    public function displayMenu();
    public function getUserInput($input);
}
