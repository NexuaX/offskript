<?php

class UserNotFoundException extends Exception {
    public function errorMessage(): string {
        return "User with this email not exist!";
    }
}