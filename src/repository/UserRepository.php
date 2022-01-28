<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__ . "/../exceptions/EmailAlreadyUsedException.php";

class UserRepository extends Repository {

    public function getUser(string $id): ?User {

        $stmn = $this->database->connect()->prepare("
            SELECT ua.*, a.image_src FROM user_accounts ua left outer join attachments a on a.id = ua.id_avatar WHERE ua.id = :id
        ");
        $stmn->bindParam(":id", $id, PDO::PARAM_STR);
        $stmn->execute();

        $user = $stmn->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            throw new UserNotFoundException();
        }

        return new User(
            $user["id"],
            $user["email"],
            $user["password"],
            $user["username"],
            $user["description"] ?: "",
            $user["date_last_login"] ?: "",
            $user["id_avatar"] ?: "",
            $user["status"] ?: "",
            $user["image_src"] ?: "avatars/default.jpg",
        );
    }

    public function getUserByEmail(string $email): ?User {

        $stmn = $this->database->connect()->prepare("
            SELECT ua.*, a.image_src FROM user_accounts ua left outer join attachments a on a.id = ua.id_avatar WHERE ua.email = :email
        ");
        $stmn->bindParam(":email", $email, PDO::PARAM_STR);
        $stmn->execute();

        $user = $stmn->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            throw new UserNotFoundException();
        }

        return new User(
            $user["id"],
            $user["email"],
            $user["password"],
            $user["username"],
            $user["description"] ?: "",
            $user["date_last_login"] ?: "",
            $user["id_avatar"] ?: "",
            $user["status"] ?: "",
            $user["image_src"] ?: "avatars/default.jpg",
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

    public function editUser(string $userId, string $username, string $description, string $attachmentId) {

        $stmn = $this->database->connect()->prepare("
            update user_accounts 
            set username = '$username', description = '$description', id_avatar = $attachmentId
            where id = $userId
        ");
        $stmn->execute();
    }

    public function getRandomUsers(string $id = "0"): array {

        $stmn = $this->database->connect()->prepare("
            select us.*, ua.username, coalesce(a.image_src, 'avatars/default.jpg') as image_src from user_stats us
            left join user_accounts ua on us.id = ua.id
            left join attachments a on a.id = ua.id_avatar
            where us.id not in (select id_following_user from follows where id_followed_user = $id ) and us.id != $id
            order by random() limit 5;
        ");
        $stmn->execute();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function isFollowedByUser(string $userId, string $userIdToCheck) {

        $stmn = $this->database->connect()->prepare("
            select * from follows where id_following_user = $userId and id_followed_user = $userIdToCheck
        ");
        $stmn->execute();

        return $stmn->rowCount();
    }

    public function followUser(string $followingUserId, string $followedUserId) {

        $stmn = $this->database->connect()->prepare("
            insert into follows 
            values (DEFAULT, $followingUserId, $followedUserId)
        ");
        $stmn->execute();
    }

    public function unfollowUser(string $followingUserId, string $followedUserId) {

        $stmn = $this->database->connect()->prepare("
            delete from follows 
            where id_following_user = $followingUserId and id_followed_user = $followedUserId
        ");
        $stmn->execute();
    }
}