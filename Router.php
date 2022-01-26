<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ProfileController.php';
require_once 'src/controllers/ProductionController.php';
require_once 'src/controllers/ApiController.php';

class Router {

    public static array $routes;

    public static function get(string $url, string $view) {
        self::$routes[$url] = $view;
    }

    public static function post(string $url, string $view) {
        self::$routes[$url] = $view;
    }

    public static function run (string $url) {
        $urlArray = explode("/", $url);

        $action = $urlArray[0];
        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        $object->$action($urlArray);
    }
}