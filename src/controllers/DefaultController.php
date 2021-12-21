<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/NewsRepository.php";

class DefaultController extends AppController {

    private Repository $newsRepository;

    public function index() {
        $this->newsRepository = NewsRepository::getInstance();
        $this->render('index', ["news" => $this->newsRepository->getNews()]);
    }

    public function explorer() {
        $this->render('explorer');
    }

    public function social() {
        $this->render('social');
    }

}
