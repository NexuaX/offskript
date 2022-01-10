<?php

class User {

    private string $id;
    private string $email;
    private string $password;
    private string $username;
    private string $description;
    private string $date_last_login;
    private string $id_avatar;
    private string $status;
    private string $image_src;

    public function __construct(string $id, string $email, string $password, string $username, string $description, string $date_last_login, string $id_avatar, string $status, string $image_src) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->description = $description;
        $this->date_last_login = $date_last_login;
        $this->id_avatar = $id_avatar;
        $this->status = $status;
        $this->image_src = $image_src;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getDateLastLogin(): string {
        return $this->date_last_login;
    }

    public function getIdAvatar(): string {
        return $this->id_avatar;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getImageSrc(): string {
        return $this->image_src;
    }
}