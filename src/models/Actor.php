<?php

class Actor {

    private string $id;
    private string $fullname;
    private string $id_picture;

    public function __construct(string $id, string $name, string $id_picture) {
        $this->id = $id;
        $this->fullname = $name;
        $this->id_picture = $id_picture;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getFullname(): string {
        return $this->fullname;
    }

    public function getIdPicture(): string {
        return $this->id_picture;
    }
}