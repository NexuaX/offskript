<?php

require_once 'AppController.php';
require_once __DIR__."/../../CookieSession.php";

class ProfileController extends AppController {

    public function profile() {

        if (!CookieSession::isUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
        }

        $this->render('profile');
    }

}