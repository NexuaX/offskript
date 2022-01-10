<?php

class WatchlistRepository extends Repository {

    public function getOtherUsersReviews(string $userId = ""): array {

        $stmn = $this->database->connect()->prepare("
            select uw.*, ua.username, coalesce(a2.image_src, 'avatars/default.jpg') as user_image, p.title, p.type, a.image_src as production_image from user_watchlist uw 
            left join user_accounts ua on uw.id_user = ua.id
            left join productions p on p.id = uw.id_production 
            left join attachments a on p.id_poster = a.id
            left join attachments a2 on a2.id = ua.id_avatar
            where uw.is_planned = false
            order by date_modified limit 5
        ");
        $stmn->execute();

        $data = array();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $data[] = array(
                "mark" => $row["mark"],
                "review" => $row["review"],
                "heart" => $row["heart"],
                "title" => $row["title"],
                "type" => $row["type"],
                "production_image" => $row["production_image"],
                "username" => $row["username"],
                "user_image" => $row["user_image"]
            );
        }

        return $data;
    }

    public function getUserReviews(string $userId): array {

        $stmn = $this->database->connect()->prepare("
            select uw.*, p.title, p.type, a.image_src from user_watchlist uw 
            left join productions p on p.id = uw.id_production 
            join attachments a on p.id_poster = a.id
            where uw.id_user = $userId and uw.is_planned = false
            order by date_modified limit 5
        ");
        $stmn->execute();

        $data = array();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $data[] = array(
                "mark" => $row["mark"],
                "review" => $row["review"],
                "heart" => $row["heart"],
                "title" => $row["title"],
                "type" => $row["type"],
                "image_src" => $row["image_src"]
            );
        }

        return $data;
    }

    public function getUserStats(string $userId): array {

        $stats = array("prodStats" => array());

        $stmn = $this->database->connect()->prepare("
            select * from user_stats where id = $userId
        ");
        $stmn->execute();

        $row = $stmn->fetch(PDO::FETCH_ASSOC);
        $stats["prodStats"]["movies"] = $row["movies"];
        $stats["prodStats"]["shows"] = $row["shows"];
        $stats["prodStats"]["animes"] = $row["animes"];
        $stats["prodStats"]["games"] = $row["games"];
        $stats["reviews"] = $row["reviews"];
        $stats["followers"] = $row["followers"];

        return $stats;
    }

    public function addToUserList(string $userId, string $prodId, bool $isPlanned = false) {

        $stmn = $this->database->connect()->prepare("
            insert into user_watchlist 
            values (DEFAULT, $userId, $prodId, DEFAULT, DEFAULT, DEFAULT, $isPlanned, DEFAULT, DEFAULT)
        ");
        $stmn->execute();
    }

    public function removeFromUserList(string $userId, string $prodId) {

        $stmn = $this->database->connect()->prepare("
            delete from user_watchlist 
            where id_user = $userId and id_production = $prodId
        ");
        $stmn->execute();
    }

    public function giveReview(string $userId, string $prodId, int $mark, bool $isHeart, string $review) {

        $stmn = $this->database->connect()->prepare("
            update user_watchlist 
            set mark = $mark, heart = $isHeart, review = '$review' 
            where id_user = $userId and id_production = $prodId
        ");
        $stmn->execute();
    }

    public function getUserToplist(string $userId) {

        $toplists = array();

        foreach (ProductionType::VALUES as $type) {
            $toplists[$type] = $this->getUserToplistWithType($userId, $type);
        }

        return $toplists;
    }

    private function getUserToplistWithType(string $userId, string $type) {

        $result = array();

        $stmn = $this->database->connect()->prepare("
            select uw.*, p.title from user_watchlist uw
            left join productions p on p.id = uw.id_production
            where id_user = $userId and type = '$type'
            order by type, mark limit 5
        ");
        $stmn->execute();

        $result = $stmn->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}