<?php

namespace App\src\model;

class User 
{
    private $id;
    private $username;
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setId($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setId($password)
    {
        $this->password = $password;
    }
}