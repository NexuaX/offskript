<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/NewsRepository.php";
require_once __DIR__."/../repository/ProductionRepository.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/WatchlistRepository.php";

class DefaultController extends AppController {

    private Repository $newsRepository;
    private Repository $productionRepository;
    private Repository $userRepository;
    private Repository $watchlistRepository;

    public function index() {
        $this->render('index');
    }

    public function explorer(array $params = []) {
        $this->render('explorer');
    }

    public function social(array $params = []) {
        $this->userRepository = UserRepository::getInstance();
        $this->watchlistRepository = WatchlistRepository::getInstance();
        $this->productionRepository = ProductionRepository::getInstance();

        $userId = "0";
        if (CookieSession::isUserLogged()) {
            $userId = CookieSession::getUserCookie();
        }

        $this->render('social', [
            "reviews" => $this->watchlistRepository->getOtherUsersReviews($userId),
            "randomUsers" => $this->userRepository->getRandomUsers($userId),
            "trendingProds" => $this->productionRepository->getTrending()
        ]);
    }

}
