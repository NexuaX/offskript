<?php

require_once 'AppController.php';
require_once __DIR__."/../../CookieSession.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/ProductionRepository.php";
require_once __DIR__."/../repository/WatchlistRepository.php";
require_once __DIR__."/../repository/AttachmentsRepository.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__ . "/../exceptions/UserNotFoundException.php";


class ProfileController extends AppController {

    private Repository $userRepository;
    private Repository $watchlistRepository;
    private Repository $productionRepository;
    private Repository $attachmentsRepository;

    const MAX_FILE_SIZE = 512*1024;
    const IMAGE_TYPES = ['image/png', 'image/jpeg'];
    const AVATARS_DIRECTORY = "/../public/img/avatars/";
    const DEFAULT_AVATAR_ID = 47;

    private string $message;

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
            "loggedUserProfile" => $userId == CookieSession::getUserCookie(),
            "isFollowedUser" => $this->userRepository->isFollowedByUser(CookieSession::getUserCookie(), $userId) == 1]);
    }

    public function changeUserData() {

        if (!CookieSession::isUserLogged() || !$this->isPost()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
        }

        $this->userRepository = UserRepository::getInstance();

        $this->message = "";
        $userId = CookieSession::getUserCookie();
        $user = null;
        try {
            $user = $this->userRepository->getUser($userId);
        } catch (UserNotFoundException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/profile");
        }

        $attachmentId = $user->getIdAvatar() != "" ?: self::DEFAULT_AVATAR_ID;

        if (is_uploaded_file($_FILES["avatar"]["tmp_name"]) && $this->validateFile($_FILES["avatar"])) {
            $ext = ".".pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
            $newFileName = dirname(__DIR__).self::AVATARS_DIRECTORY."avatar".$userId.$ext;
            if (file_exists($newFileName))
                unlink($newFileName);
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $newFileName);
            $this->attachmentsRepository = AttachmentsRepository::getInstance();
            $attachmentId = $this->attachmentsRepository->addAttachment("avatars/avatar".$userId.$ext)["id"];
        }

        if ($_POST["username"] == "") {
            $this->message = "Username can't be blank!!";
        } else {
            $this->userRepository->editUser($userId, $_POST["username"], $_POST["description"], $attachmentId);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/profile?message=".urlencode($this->message));
    }

    private function validateFile(array $file): bool {
        if (isset($file["type"]) && !in_array($file["type"], self::IMAGE_TYPES)) {
            $this->message = "Unsupported file type!";
            return false;
        }
        if ($file["size"] > self::MAX_FILE_SIZE) {
            $this->message = "File to large! Max 512kb";
            return false;
        }
        return true;
    }

}