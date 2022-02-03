<?php

require_once "Database.php";

class CookieSession {

    const USER_COOKIE = "user";
    const DEFAULT_TIME = 600;

    public static function isUserLogged(): bool {
        $token = self::getUserCookie();
        if (self::validateSession($token)) {
            return true;
        } else {
            self::destroyUserSession();
            return false;
        }
    }

    public static function createUserSession(string $userId) {

        $database = new Database();

        $token = self::generateToken();
        $interval = self::DEFAULT_TIME." second";

        $stmn = $database->connect()->prepare("
            delete from user_session 
            where id_user = $userId;
            insert into user_session 
            values (DEFAULT, 10, '$token', DEFAULT, now() + interval '$interval')
        ");
        $stmn->execute();

        self::createCookie(self::USER_COOKIE, $token, time() + self::DEFAULT_TIME);
    }

    public static function destroyUserSession() {
        $database = new Database();

        $userId = self::getUserId();

        $stmn = $database->connect()->prepare("
            delete from user_session 
            where id_user = $userId
        ");
        $stmn->execute();

        self::deleteCookie(self::USER_COOKIE);
    }

    public static function extendUserCookie(int $duration = self::DEFAULT_TIME) {
        if (self::isUserLogged()) {
            $database = new Database();

            $userId = self::getUserId();
            $interval = "$duration second";

            $stmn = $database->connect()->prepare("
                update user_session 
                set date_valid = now() + interval '$interval' 
                where id_user = $userId
            ");
            $stmn->execute();

            self::createCookie(self::USER_COOKIE, $_COOKIE[self::USER_COOKIE], time() + $duration);
        }
    }

    public static function getUserCookie(): string {
        return $_COOKIE[self::USER_COOKIE] ?? "";
    }

    public static function getUserId() {
        $database = new Database();

        $token = self::getUserCookie();

        $stmn = $database->connect()->prepare("
            select id_user from user_session where token = '$token'
        ");
        $stmn->execute();

        if ($stmn->rowCount() == 0) {
            return "0";
        }
        return $stmn->fetch(PDO::FETCH_ASSOC)["id_user"];
    }

    private static function createCookie(string $name, string $value, int $expires = 0) {
        setcookie($name, $value, $expires, "/");
    }

    private static function deleteCookie(string $name) {
        if (isset($_COOKIE[$name])) {
            setcookie($name, '', time() - 3600);
        }
    }

    private static function generateToken() {
        try {
            return bin2hex(random_bytes(16));
        } catch (Exception) {
            die("Couldn't generate user token!");
        }
    }

    private static function validateSession(string $token) {
        $database = new Database();

        $stmn = $database->connect()->prepare("
            select id_user, token, date_valid > now() as valid from user_session where token = '$token'
        ");
        $stmn->execute();

        if ($stmn->rowCount() == 0) {
            return false;
        } else {
            return $stmn->fetch(PDO::FETCH_ASSOC)["valid"];
        }
    }
    
}