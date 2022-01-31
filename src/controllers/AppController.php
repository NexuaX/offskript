<?php

require_once __DIR__."/../../CookieSession.php";
require_once __DIR__."/../repository/NewsRepository.php";
require_once __DIR__."/../repository/ProductionRepository.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/WatchlistRepository.php";
require_once __DIR__."/../repository/FavoriteRepository.php";
require_once __DIR__."/../repository/AttachmentsRepository.php";

class AppController {

    private string $request;
    private string $contentType;

    protected Repository $newsRepository;
    protected Repository $productionRepository;
    protected Repository $userRepository;
    protected Repository $watchlistRepository;
    protected Repository $favoriteRepository;
    protected Repository $attachmentsRepository;

    public function __construct() {
        $this->request = $_SERVER['REQUEST_METHOD'];
        $this->contentType = $_SERVER['CONTENT_TYPE'];

        $this->newsRepository = NewsRepository::getInstance();
        $this->productionRepository = ProductionRepository::getInstance();
        $this->userRepository = UserRepository::getInstance();
        $this->watchlistRepository = WatchlistRepository::getInstance();
        $this->favoriteRepository = FavoriteRepository::getInstance();
        $this->attachmentsRepository = AttachmentsRepository::getInstance();
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }

    protected function isPost(): bool {
        return $this->request === 'POST';
    }

    protected function isJsonType(): bool {
        return $this->contentType === 'application/json';
    }

    protected function render(string $template = null, array $variables = []) {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';

        if (file_exists($templatePath)) {
            extract($variables);
            $isUserLogged = CookieSession::isUserLogged();

            if ($isUserLogged) {
                CookieSession::extendUserCookie();
            }

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}
