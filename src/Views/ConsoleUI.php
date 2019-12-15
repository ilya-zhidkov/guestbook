<?php

namespace GuestBook\Views;

use GuestBook\Views\UI;

class ConsoleUI implements UI
{
    public function displayMenu()
    {
        echo "\nGuestBook\n";
        echo "**************************\n";
        echo "\nChoose one of the options\n";
        echo "--------------------------\n";
        echo "1. Create a new record.\n";
        echo "2. Read existing records.\n";
        echo "3. Leave.\n";
    }

    public function getUserInput($input)
    {
        return readline($input);
    }
}
