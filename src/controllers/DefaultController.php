<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('index');
    }

    public function explorer() {
        $this->render('explorer');
    }

    public function social() {
        $this->render('social');
    }

}
