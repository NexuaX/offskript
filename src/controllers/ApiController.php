<?php

require_once 'AppController.php';
require_once __DIR__."/../../CookieSession.php";

class ApiController extends AppController {

    public function explorerSearch(array $params = []) {

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

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();
            echo json_encode($this->newsRepository->getNews(true));
        }
    }

    public function globalTopList() {

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            echo json_encode($this->productionRepository->getTopAll(true));
        }
    }

    public function addToWatchList() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? 10 : CookieSession::getUserCookie();
            $this->watchlistRepository->addToUserList($userId, $decoded["productionId"], $decoded["isPlanned"]);

            echo json_encode("ok");
        }
    }

    public function addUserReview() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? 10 : CookieSession::getUserCookie();
            $this->watchlistRepository->giveReview($userId, $decoded["productionId"], $decoded["mark"], $decoded["heart"], $decoded["review"]);

            echo json_encode("ok");
        }
    }

    public function removeFromUserWatchList() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? 10 : CookieSession::getUserCookie();
            $this->watchlistRepository->removeFromUserList($userId, $decoded["productionId"]);

            echo json_encode("ok");
        }
    }

    public function getOtherReviewsOnProduction() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            echo json_encode($this->watchlistRepository->getOtherUsersReviewsOnProduction($decoded["productionId"]));
        }
    }

    public function getProductionEntities() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? "0" : CookieSession::getUserCookie();
            echo json_encode($this->productionRepository->getProductionEntities($decoded["productionId"], $userId));
        }
    }

    public function markEntityAsFavorite() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? "0" : CookieSession::getUserCookie();
            $this->favoriteRepository->addUserFavoriteWithType($userId, $decoded["entityId"], $decoded["type"]);
            echo json_encode("ok");
        }
    }

    public function removeEntityAsFavorite() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie() == "" ? "0" : CookieSession::getUserCookie();
            $this->favoriteRepository->removeUserFavoriteDirector($userId, $decoded["entityId"]);
            echo json_encode("ok");
        }
    }

    public function getRecommendations() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            echo json_encode($this->productionRepository->getTrending(true));
        }
    }

    public function getUserReviews(array $params = []) {

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->watchlistRepository->getUserReviews($userId));
        }
    }

    public function getFollowedUsers(array $params = []) {

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->userRepository->getFollowedUsers($userId));
        }
    }

    public function getUserFavorites(array $params = []) {

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->favoriteRepository->getUserFavorites($userId));
        }
    }

    public function getUserTopList(array $params = []) {

        if ($this->isJsonType()) {
            $this->setHeaderAndCode();

            $userId = $params[1] ?? CookieSession::getUserCookie();
            echo json_encode($this->watchlistRepository->getUserToplist($userId));
        }
    }

    public function followUser() {

        if ($this->isJsonType()) {
            $decoded = $this->decodeDataFromInput();
            $this->setHeaderAndCode();

            $userId = CookieSession::getUserCookie();
            $this->userRepository->followUser($userId, $decoded["followedUserId"]);
            echo json_encode("ok");
        }
    }

    public function unfollowUser() {

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