<?php

class Production {

    private string $id;
    private string $title;
    private string $synopsis;
    private string $date_produced;
    private string $type;
    private string $id_poster;

    private float $mark;
    private int $heartsCount;
    private string $image_src;

    public function __construct(string $id, string $title, string $synopsis, string $date_produced, string $type, string $id_poster, float $mark, int $heartsCount, string $image_src) {
        $this->id = $id;
        $this->title = $title;
        $this->synopsis = $synopsis;
        $this->date_produced = $date_produced;
        $this->type = $type;
        $this->id_poster = $id_poster;
        $this->mark = $mark;
        $this->heartsCount = $heartsCount;
        $this->image_src = $image_src;
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

    public function getType(): string {
        return $this->type;
    }

    public function getIdPoster(): string {
        return $this->id_poster;
    }

    public function getMark(): string {
        return $this->mark;
    }

    public function getHeartsCount(): string {
        return $this->heartsCount;
    }

    public function getImageSrc(): string {
        return $this->image_src;
    }
}
