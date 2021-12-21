<?php

class Character {

    private string $id;
    private string $name;
    private string $id_actor;
    private string $id_picture;

    public function __construct(string $id, string $name, string $id_actor, string $id_picture) {
        $this->id = $id;
        $this->name = $name;
        $this->id_actor = $id_actor;
        $this->id_picture = $id_picture;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getIdActor(): string {
        return $this->id_actor;
    }

    public function getIdPicture(): string {
        return $this->id_picture;
    }
}