<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ . "/../exceptions/EmailAlreadyUsedException.php";


class SecurityController extends AppController {

    public function login() {

        if (!$this->isPost()) {
            $this->render('login');
            return;
        }

        $userRepository = UserRepository::getInstance();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if ($user == null) {
            $this->render('login', ['messages' => ['User with this email not exist!']]);
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            $this->render('login', ['messages' => ['Wrong password!']]);
            return;
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/profile");
    }

    public function register() {

        if (!$this->isPost()) {
            $this->render('register');
            return;
        }

        $userRepository = UserRepository::getInstance();

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['confirm_password'];

        if ($password != $passwordConfirm) {
            $this->render('register', ["messages" => ["Passwords are not the same!"]]);
            return;
        }

        try {
            $result = $userRepository->addUser($email, $password, $username);
        } catch (EmailAlreadyUsedException | SQLExecuteException $e) {
            $this->render('register', ["messages" => [$e->errorMessage()]]);
            return;
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }

}