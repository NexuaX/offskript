<?php

abstract class ProductionType {
    const MOVIE = "movie";
    const SHOW = "show";
    const GAME = "game";
    const ANIME = "anime";

    const VALUES = [
        self::MOVIE,
        self::SHOW,
        self::GAME,
        self::ANIME
    ];
}