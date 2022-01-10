<?php

require_once "Repository.php";
require_once __DIR__."/../models/Production.php";
require_once __DIR__."/../models/ProductionType.php";

class ProductionRepository extends Repository {

    public function getDefaultMovies(): array {
        return $this->getDefault(ProductionType::MOVIE);
    }

    public function getDefaultShows(): array {
        return $this->getDefault(ProductionType::SHOW);
    }

    public function getDefaultAnimes(): array {
        return $this->getDefault(ProductionType::ANIME);
    }

    public function getDefaultGames(): array {
        return $this->getDefault(ProductionType::GAME);
    }

    public function getTopMovies(): array {
        return $this->getDefault(ProductionType::MOVIE, "mark", 5);
    }

    public function getTopShows(): array {
        return $this->getDefault(ProductionType::SHOW, "mark", 5);
    }

    public function getTopAnimes(): array {
        return $this->getDefault(ProductionType::ANIME, "mark", 5);
    }

    public function getTopGames(): array {
        return $this->getDefault(ProductionType::GAME, "mark", 5);
    }

    public function getProduction(string $id): Production {

        $stmn = $this->database->connect()->prepare("
           select * from production_stats where id = $id
        ");
        $stmn->execute();

        $row = $stmn->fetch(PDO::FETCH_ASSOC);
        $production = new Production(
            $row["id"],
            $row["title"],
            $row["synopsis"],
            $row["date_produced"],
            $row["type"],
            $row["id_poster"] ?: "",
            $row["mark"] ?: 0,
            $row["hearts"],
            $row["image_src"] ?: "posters/default.jpg"
        );

        return $production;
    }

    public function getTrending() {

        $stmn = $this->database->connect()->prepare("
           select * from production_stats 
           where DATE_PART('day', now() - date_produced) < 1000
           order by hearts
        ");
        $stmn->execute();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        $prods = array();
        foreach ($rows as $row) {
            $prods[] = new Production(
                $row["id"],
                $row["title"],
                $row["synopsis"],
                $row["date_produced"],
                $row["type"],
                $row["id_poster"] ?: "",
                $row["mark"] ?: 0,
                $row["hearts"],
                $row["image_src"] ?: "posters/default.jpg"
            );
        }

        return $prods;
    }

    public function search(string $sentence) {

        $sentence = strtolower($sentence);

        $stmn = $this->database->connect()->prepare("
            select * from productions 
            where lower(title) like '%$sentence%' or lower(synopsis) like '%$sentence%'
            union distinct 
            select p.* from productions p
            left join production_director pd on p.id = pd.id_production 
            left join directors d on pd.id_director = d.id 
            where d.name like '%$sentence%' 
            union distinct 
            select p.* from productions p 
            left join production_character pc on p.id = pc.id_production 
            left join characters c on pc.id_character = c.id 
            where c.name like '%$sentence%' 
            union distinct 
            select p.* from productions p 
            left join production_studio ps on p.id = ps.id_production 
            left join studios s on ps.id_studio = s.id 
            where s.name like '%$sentence%' 
            union distinct 
            select p.* from productions p 
            left join production_tag pt on p.id = pt.id_production 
            left join tags t on pt.id_tag = t.id 
            where t.tag like '%$sentence%'
        ");
        $stmn->execute();

        return $stmn->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getDefault(string $type, string $order = "date_produced", int $limit = 10): array {

        $stmn = $this->database->connect()->prepare("
           select * from production_stats where type='$type' order by $order desc limit $limit
        ");
        $stmn->execute();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        $prods = array();
        foreach ($rows as $row) {
            $prods[] = new Production(
                $row["id"],
                $row["title"],
                $row["synopsis"],
                $row["date_produced"],
                $row["type"],
                $row["id_poster"] ?: "",
                $row["mark"] ?: 0,
                $row["hearts"],
                $row["image_src"] ?: "posters/default.jpg"
            );
        }

        return $prods;
    }
}