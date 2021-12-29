<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__ . "/../exceptions/EmailAlreadyUsedException.php";

class UserRepository extends Repository {

    public function getUser(string $email): ?User {

        $stmn = $this->database->connect()->prepare("
            SELECT * FROM public.user_accounts WHERE email = :email
        ");
        $stmn->bindParam(":email", $email, PDO::PARAM_STR);
        $stmn->execute();

        $user = $stmn->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            // TODO napisać exception
            return null;
        }

        return new User(
            $user["id"],
            $user["email"],
            $user["password"],
            $user["username"],
            $user["description"] ?: "",
            $user["date_last_login"] ?: "",
            $user["id_avatar"] ?: "",
            $user["status"] ?: ""
        );
    }

    public function addUser(string $email, string $password, string $username) {

        $stmn = $this->database->connect()->prepare("
            select count(*) from user_accounts where email = :email
        ");
        $stmn->bindParam(":email", $email, PDO::PARAM_STR);
        $stmn->execute();

        $result = $stmn->fetch(PDO::FETCH_NUM);
        if ($result[0] > 0) {
            throw new EmailAlreadyUsedException();
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmn = $this->database->connect()->prepare("
            insert into user_accounts (email, password, username)
            values (?, ?, ?) 
        ");

        if ($stmn->execute([$email, $passwordHash, $username])) {
            return true;
        } else {
            throw new SQLExecuteException();
        }
    }
}