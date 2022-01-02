<?php


class CookieSession {

    const USER_COOKIE = "user";

    public static function createCookie(string $name, string $value, int $expires = 0) {
        setcookie($name, $value, $expires);
    }

    public static function deleteCookie(string $name) {
        if (isset($_COOKIE[$name])) {
            setcookie($name, '', time() - 3600);
        }
    }

    public static function isCookieValid(string $name): bool {
        return isset($_COOKIE[$name]);
    }

    public static function isUserLogged(): bool {
        return self::isCookieValid(self::USER_COOKIE);
    }

    public static function logUserCookie(string $userToken) {
        self::createCookie(self::USER_COOKIE, $userToken, time() + 60);
    }

    public static function destroyUserCookie() {
        self::deleteCookie(self::USER_COOKIE);
    }

    public static function extendUserCookie(int $duration = 60) {
        if (self::isUserLogged()) {
            self::createCookie(self::USER_COOKIE, $_COOKIE[self::USER_COOKIE], time() + $duration);
        }
    }
    
}