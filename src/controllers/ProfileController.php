<?php

require_once 'AppController.php';
require_once __DIR__."/../../CookieSession.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/ProductionRepository.php";
require_once __DIR__."/../repository/WatchlistRepository.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__ . "/../exceptions/UserNotFoundException.php";


class ProfileController extends AppController {

    private Repository $userRepository;
    private Repository $watchlistRepository;
    private Repository $productionRepository;

    public function profile(array $params = []) {

        if (!CookieSession::isUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
        }

        $this->userRepository = UserRepository::getInstance();
        $this->watchlistRepository = WatchlistRepository::getInstance();
        $this->productionRepository = ProductionRepository::getInstance();

        $user = null;
        $userId = $params[1] ?? CookieSession::getUserCookie();

        try {
            $user = $this->userRepository->getUser($userId);
        } catch (UserNotFoundException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url");
        }

        $userStats = $this->watchlistRepository->getUserStats($userId);

        $this->render('profile', [
            "user" => $user,
            "userStats" => $userStats,
            "loggedUserProfile" => $userId == CookieSession::getUserCookie()]);
    }

}