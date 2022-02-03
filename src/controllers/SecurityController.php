<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ . "/../exceptions/EmailAlreadyUsedException.php";
require_once __DIR__ . "/../exceptions/UserNotFoundException.php";
require_once __DIR__."/../../CookieSession.php";


class SecurityController extends AppController {

    public function login(array $params = []) {

        if (!$this->isPost()) {
            $this->render('login');
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $user = $this->userRepository->getUserByEmail($email);
        } catch (UserNotFoundException $e) {
            $this->render('login', ['messages' => [$e->errorMessage()]]);
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            $this->render('login', ['messages' => ['Wrong password!']]);
            return;
        }

        CookieSession::createUserSession($user->getId());

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/profile");
    }

    public function register(array $params = []) {

        if (!$this->isPost()) {
            $this->render('register');
            return;
        }

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['confirm_password'];

        if ($password != $passwordConfirm) {
            $this->render('register', ["messages" => ["Passwords are not the same!"]]);
            return;
        }

        try {
            $this->userRepository->addUser($email, $password, $username);
        } catch (EmailAlreadyUsedException | SQLExecuteException $e) {
            $this->render('register', ["messages" => [$e->errorMessage()]]);
            return;
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }

    public function logout(array $params = []) {

        if (CookieSession::isUserLogged()) {
            CookieSession::destroyUserSession();
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url");
    }

}