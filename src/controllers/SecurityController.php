<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';


class SecurityController extends AppController {

    public function login() {

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $user = new User('1', 'admin@offskript.com', 'adminpass', 'Administoreta');

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/");
    }

}