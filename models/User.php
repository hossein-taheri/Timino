<?php

namespace Model;


class User{
    protected $id;

    private $first_name;

    private $last_name;

    private $username;

    private $email;

    private $password;

    private $isConfirmed;

    public function __construct()
    {
        $this->isConfirmed = false;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function checkPassword(string $password): bool
    {
        return ( $password == $this->password );
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function hasConfirmed(): bool
    {
        return $this->isConfirmed;
    }
}
