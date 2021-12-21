<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";

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
            $user["description"],
            $user["date_last_login"] ?: "",
            $user["id_avatar"] ?: "",
            $user["status"]
        );
    }
}