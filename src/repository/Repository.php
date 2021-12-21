<?php

require_once __DIR__."/../../Database.php";

class Repository {

    private static Repository $INSTANCE;
    protected Database $database;

    protected function __construct() {
        $this->database = new Database();
    }

    public static function getInstance(): Repository {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new static();
        }

        return self::$INSTANCE;
    }
}