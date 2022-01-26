<?php

class UserWatchlistItem {

    private string $id;
    private string $id_user;
    private string $id_production;
    private float $mark;
    private string $date_added;
    private string $review;
    private bool $is_planned;
    private string $date_modified;
    private bool $heart;

    public function __construct(string $id, string $id_user, string $id_production, ?float $mark, string $date_added, ?string $review, bool $is_planned, string $date_modified, bool $heart) {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_production = $id_production;
        $this->mark = $mark ?? 0;
        $this->date_added = $date_added;
        $this->review = $review ?? "";
        $this->is_planned = $is_planned;
        $this->date_modified = $date_modified;
        $this->heart = $heart;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getIdUser(): string {
        return $this->id_user;
    }

    public function getIdProduction(): string {
        return $this->id_production;
    }

    public function getMark(): float {
        return $this->mark;
    }

    public function getDateAdded(): string {
        return $this->date_added;
    }

    public function getReview(): string {
        return $this->review;
    }

    public function isPlanned(): bool {
        return $this->is_planned;
    }

    public function getDateModified(): string {
        return $this->date_modified;
    }

    public function isHeart(): bool {
        return $this->heart;
    }
}