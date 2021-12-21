<?php

class News {

    private string $id;
    private string $title;
    private string $image_src;
    private string $date_added;

    public function __construct(string $id, string $title, string $image_src, string $date_added) {
        $this->id = $id;
        $this->title = $title;
        $this->image_src = $image_src;
        $this->date_added = $date_added;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getImageSrc(): string {
        return $this->image_src;
    }

    public function getDateAdded(): string {
        return $this->date_added;
    }
}