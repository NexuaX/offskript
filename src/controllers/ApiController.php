<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/NewsRepository.php";
require_once __DIR__."/../repository/ProductionRepository.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/WatchlistRepository.php";
require_once __DIR__."/../repository/FavoriteRepository.php";
require_once __DIR__."/../../CookieSession.php";

class ApiController extends AppController {

    private Repository $newsRepository;
    private Repository $productionRepository;
    private Repository $userRepository;
    private Repository $watchlistRepository;
    private Repository $favoriteRepository;

    public function explorerSearch(array $params = []) {

        $this->productionRepository = ProductionRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            if ($decoded["sentence"] == "") {
                echo json_encode($this->productionRepository->getDefaultAll(true));
            } else {
                echo json_encode($this->productionRepository->search($decoded["sentence"]));
            }
        }
    }

    public function indexNews(array $params = []) {

        $this->newsRepository = NewsRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();
            echo json_encode($this->newsRepository->getNews(true));
        }
    }

    public function globalTopList() {

        $this->productionRepository = ProductionRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            echo json_encode($this->productionRepository->getTopAll(true));
        }
    }

    public function addToWatchList() {

        $this->watchlistRepository = WatchlistRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? 10 : CookieSession::getUserCookie();
            $this->watchlistRepository->addToUserList($userId, $decoded["productionId"], $decoded["isPlanned"]);

            echo json_encode("ok");
        }
    }

    public function addUserReview() {

        $this->watchlistRepository = WatchlistRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? 10 : CookieSession::getUserCookie();
            $this->watchlistRepository->giveReview($userId, $decoded["productionId"], $decoded["mark"], $decoded["heart"], $decoded["review"]);

            echo json_encode("ok");
        }
    }

    public function removeFromUserWatchList() {

        $this->watchlistRepository = WatchlistRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? 10 : CookieSession::getUserCookie();
            $this->watchlistRepository->removeFromUserList($userId, $decoded["productionId"]);

            echo json_encode("ok");
        }
    }

    public function getOtherReviewsOnProduction() {

        $this->watchlistRepository = WatchlistRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            echo json_encode($this->watchlistRepository->getOtherUsersReviewsOnProduction($decoded["productionId"]));
        }
    }

    public function getProductionEntities() {

        $this->productionRepository = ProductionRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? "0" : CookieSession::getUserCookie();
            echo json_encode($this->productionRepository->getProductionEntities($decoded["productionId"], $userId));
        }
    }

    public function markEntityAsFavorite() {

        $this->favoriteRepository = FavoriteRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? "0" : CookieSession::getUserCookie();
            $this->favoriteRepository->addUserFavoriteDirector($userId, $decoded["entityId"]);
            echo json_encode("ok");
        }
    }

    public function removeEntityAsFavorite() {

        $this->favoriteRepository = FavoriteRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? "0" : CookieSession::getUserCookie();
            $this->favoriteRepository->removeUserFavoriteDirector($userId, $decoded["entityId"]);
            echo json_encode("ok");
        }
    }

    public function getRecommendations() {

        $this->productionRepository = ProductionRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            echo json_encode($this->productionRepository->getTrending(true));
        }
    }

    public function getUserReviews(array $params = []) {

        $this->watchlistRepository = WatchlistRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->watchlistRepository->getUserReviews($userId));
        }
    }

    public function getRandomUsers(array $params = []) {

        $this->userRepository = UserRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->userRepository->getRandomUsers($userId));
        }
    }

    public function getFollowedUsers(array $params = []) {

        $this->userRepository = UserRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->userRepository->getFollowedUsers($userId));
        }
    }

    public function getUserFavorites(array $params = []) {

        $this->favoriteRepository = FavoriteRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->favoriteRepository->getUserFavorites($userId));
        }
    }

    public function getUserTopList(array $params = []) {

        $this->watchlistRepository = WatchlistRepository::getInstance();

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->watchlistRepository->getUserToplist($userId));
        }
    }

    public function followUser() {

        $this->userRepository = UserRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie();
            $this->userRepository->followUser($userId, $decoded["followedUserId"]);
            echo json_encode("ok");
        }
    }

    public function unfollowUser() {

        $this->userRepository = UserRepository::getInstance();

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie();
            echo $userId;
            $this->userRepository->unfollowUser($userId, $decoded["followedUserId"]);
            echo json_encode("ok");
        }
    }

    private function setHeaderAndCode() {
        header("Content-Type: application/json");
        http_response_code(200);
    }

    private function decodeDataFromInput(): array {
        $content = file_get_contents("php://input");
        return json_decode($content, true);
    }

}