<?php

require 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('explorer', 'DefaultController');
Router::get('social', 'DefaultController');
Router::get('profile', 'ProfileController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');

Router::run($path);
