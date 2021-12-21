<?php

require_once "Repository.php";
require_once __DIR__."/../models/News.php";

class NewsRepository extends Repository {

    public function getNews(): array {

        $stmn = $this->database->connect()->prepare("
            select n.id, title, image_src, date_added from news n left join attachments a on a.id = n.id_picture
        ");
        $stmn->execute();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        $news = array();
        foreach ($rows as $row) {
            $news[] = new News(
                $row["id"],
                $row["title"],
                $row["image_src"] ?: "news-images/news_placeholder.jpeg",
                $row["date_added"]
            );
        }

        return $news;
    }
}