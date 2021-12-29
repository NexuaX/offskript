<?php

class EmailAlreadyUsedException extends Exception {
    public function errorMessage(): string {
        return "Email already in database!";
    }
}