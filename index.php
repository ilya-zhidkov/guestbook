<?php

require_once 'File.php';
require_once 'GuestBook.php';

$book = new GuestBook(new File('log.txt'));
$book->run();
