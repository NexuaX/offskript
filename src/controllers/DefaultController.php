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
        $this->newsRepository = NewsRepository::getInstance();
        $this->productionRepository = ProductionRepository::getInstance();

        $this->render('index', [
            "news" => $this->newsRepository->getNews(),
            "topMovies" => $this->productionRepository->getTopMovies(),
            "topShows" => $this->productionRepository->getTopShows(),
            "topAnimes" => $this->productionRepository->getTopAnimes(),
            "topGames" => $this->productionRepository->getTopGames()]);
    }

    public function explorer(array $params = []) {
        $this->productionRepository = ProductionRepository::getInstance();

        $this->render('explorer', [
            "movies" => $this->productionRepository->getDefaultMovies(),
            "shows" => $this->productionRepository->getDefaultShows(),
            "animes" => $this->productionRepository->getDefaultAnimes(),
            "games" => $this->productionRepository->getDefaultGames()]);
    }

    public function social(array $params = []) {
        $this->userRepository = UserRepository::getInstance();
        $this->watchlistRepository = WatchlistRepository::getInstance();
        $this->productionRepository = ProductionRepository::getInstance();

        $this->render('social', [
            "reviews" => $this->watchlistRepository->getOtherUsersReviews(),
            "randomUsers" => $this->userRepository->getRandomUsers(),
            "trendingProds" => $this->productionRepository->getTrending()
        ]);
    }

}
