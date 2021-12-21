<?php

class Production {

    private string $id;
    private string $title;
    private string $synopsis;
    private string $date_produced;
    private ProductionType $type;
    private string $id_poster;

    public function __construct(string $id, string $title, string $synopsis, string $date_produced, ProductionType $type, string $id_poster) {
        $this->id = $id;
        $this->title = $title;
        $this->synopsis = $synopsis;
        $this->date_produced = $date_produced;
        $this->type = $type;
        $this->id_poster = $id_poster;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getSynopsis(): string {
        return $this->synopsis;
    }

    public function getDateProduced(): string {
        return $this->date_produced;
    }

    public function getType(): ProductionType {
        return $this->type;
    }

    public function getIdPoster(): string {
        return $this->id_poster;
    }
}
