<?php

require_once __DIR__."/../../Database.php";

class Repository {

    protected Database $database;

    private static array $instances = [];

    protected function __construct() {
        $this->database = new Database();
    }

    public static function getInstance(): Repository {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}