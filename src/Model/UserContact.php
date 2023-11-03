<?php

namespace App\Model;

class UserContact{

    private $username;
    private $telephone;
    private $email;
    private $email_confirmed;
    private $message;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username):self
    {
        $this->username = $username;
        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone):self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail(string $email):self
    {
        $this->email = $email;
        return $this;
    }

    public function getEmailConfirmed()
    {
        return $this->email_confirmed;
    }

    public function setEmailConfirmed(string $email_confirmed):self
    {
        $this->email_confirmed = $email_confirmed;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage(string $message):self
    {
        $this->message = $message;
        return $this;
    }
}