<?php

class Email
{
    private $email;

    private $valid;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        $this->valid = preg_match('/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,4}$/i', $email) ? true : false;

        return $this;
    }

    public function getValid()
    {
        return $this->valid;
    }

    public function __construct($email)
    {
        $this->setEmail($email);
    }
}
