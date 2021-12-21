<?php

class Attachment {

    private string $id;
    private string $image_src;

    public function __construct(string $id, string $image_src) {
        $this->id = $id;
        $this->image_src = $image_src;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getImageSrc(): string {
        return $this->image_src;
    }
}