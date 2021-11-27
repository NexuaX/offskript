<?php

class User {

    private string $id;
    private string $email;
    private string $password;
    private string $username;

    public function __construct(string $id, string $email, string $password, string $username) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

}