<?php

require_once 'AppController.php';
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__ .'/../models/User.php';


class SecurityController extends AppController {

    public function login() {

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $userRepository = UserRepository::getInstance();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if ($user == null) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/profile");
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        echo "registered!";
    }

}