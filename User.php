<?php

class User
{
    private $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function toString() : string
    {
        return $this->username;
    }
}
