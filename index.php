<?php

require __DIR__ . '/vendor/autoload.php';

use GuestBook\Core\GuestBook;
use GuestBook\Core\Models\File;

$book = new GuestBook(new File('log.txt'));
$book->run();
