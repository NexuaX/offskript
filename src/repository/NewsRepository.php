<?php

require_once "Repository.php";
require_once __DIR__."/../models/News.php";

class NewsRepository extends Repository {

    public function getNews(bool $associative = false): array {

        $stmn = $this->database->connect()->prepare("
            select n.id, title, image_src, date_added from news n left join attachments a on a.id = n.id_picture
            order by date_added desc
        ");
        $stmn->execute();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        if ($associative) {
            return $rows;
        } else {
            return $this->mapToObjects($rows);
        }
    }

    private function mapToObjects($rows): array {

        $news = array();
        foreach ($rows as $row) {
            $news[] = new News(
                $row["id"],
                $row["title"],
                $row["image_src"],
                $row["date_added"]
            );
        }

        return $news;
    }
}