<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('index');
    }

    public function explorer(array $params = []) {
        $this->render('explorer');
    }

    public function social(array $params = []) {

        $userId = "0";
        if (CookieSession::isUserLogged()) {
            $userId = CookieSession::getUserId();
        }

        $this->render('social', [
            "reviews" => $this->watchlistRepository->getOtherUsersReviews($userId),
            "randomUsers" => $this->userRepository->getRandomUsers($userId),
            "trendingProds" => $this->productionRepository->getTrending()
        ]);
    }

}
