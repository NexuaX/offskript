<?php

require 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('explorer', 'DefaultController');
Router::get('social', 'DefaultController');
Router::get('profile', 'ProfileController');
Router::get('production', 'ProductionController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::get('logout', 'SecurityController');

// API CALLS
Router::get("explorerSearch", "ApiController");
Router::get("indexNews", "ApiController");
Router::get("globalTopList", "ApiController");
Router::get("addUserReview", "ApiController");
Router::get("addToWatchList", "ApiController");
Router::get("removeFromUserWatchList", "ApiController");
Router::get("getOtherReviewsOnProduction", "ApiController");
Router::get("getRecommendations", "ApiController");
Router::get("getProductionEntities", "ApiController");
Router::get("markEntityAsFavorite", "ApiController");
Router::get("removeEntityAsFavorite", "ApiController");
Router::get("getUserReviews", "ApiController");
Router::get("getRandomUsers", "ApiController");
Router::get("getUserFavorites", "ApiController");
Router::get("getUserTopList", "ApiController");

Router::run($path);
