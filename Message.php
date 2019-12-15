<?php

require_once 'Writeable.php';

class Message implements Writeable
{
    private $username;
    private $contents;
    private $created_at;

    public function __construct(string $username, string $contents)
    {
        $this->username = $username;
        $this->contents = $contents;
        $this->created_at = date('d. m. Y H:i:s');
    }

    public function toString() : string
    {
        $output = "Author: {$this->username}" . PHP_EOL;
        $output .= "Contents: {$this->contents}" . PHP_EOL;
        $output .= "Created at: {$this->created_at}" . PHP_EOL;
        $output .= "------------------------" . PHP_EOL;
        return $output;
    }
}
