<?php

namespace GuestBook\Core\Models;

use GuestBook\Core\Writeable;

class Message implements Writeable
{
    private $username;
    private $contents;
    private $createdAt;

    public function __construct(string $username, string $contents)
    {
        $this->username = $username;
        $this->contents = $contents;
        $this->createdAt = (new \DateTime())->getTimestamp();
    }

    public function toString() : string
    {
        return "{$this->username}-{$this->contents}-{$this->createdAt}";
    }
}
