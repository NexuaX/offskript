<?php

class SQLExecuteException extends Exception {
    public function errorMessage(): string {
        return "Error occurred!";
    }
}