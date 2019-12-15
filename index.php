<?php

require __DIR__ . '/vendor/autoload.php';

use GuestBook\Core\GuestBook;
use GuestBook\Core\Models\File;
use GuestBook\Views\ConsoleUI;

$book = new GuestBook(new ConsoleUI(), new File('log.txt'));
$book->run();
