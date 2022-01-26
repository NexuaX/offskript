<?php

require_once "Repository.php";
require_once __DIR__."/../models/Production.php";
require_once __DIR__."/../models/ProductionType.php";

class ProductionRepository extends Repository {

    public function getDefaultMovies(bool $associative = false): array {
        return $this->getDefault(ProductionType::MOVIE, associative: $associative);
    }

    public function getDefaultShows(bool $associative = false): array {
        return $this->getDefault(ProductionType::SHOW, associative: $associative);
    }

    public function getDefaultAnimes(bool $associative = false): array {
        return $this->getDefault(ProductionType::ANIME, associative: $associative);
    }

    public function getDefaultGames(bool $associative = false): array {
        return $this->getDefault(ProductionType::GAME, associative: $associative);
    }

    public function getDefaultAll(bool $associative = false): array {
        return [
            "movie" => $this->getDefaultMovies($associative),
            "show" => $this->getDefaultShows($associative),
            "anime" => $this->getDefaultAnimes($associative),
            "game" => $this->getDefaultGames($associative)
        ];
    }

    public function getTopMovies(bool $associative = false): array {
        return $this->getDefault(ProductionType::MOVIE, "mark", 5, associative: $associative);
    }

    public function getTopShows(bool $associative = false): array {
        return $this->getDefault(ProductionType::SHOW, "mark", 5, associative: $associative);
    }

    public function getTopAnimes(bool $associative = false): array {
        return $this->getDefault(ProductionType::ANIME, "mark", 5, associative: $associative);
    }

    public function getTopGames(bool $associative = false): array {
        return $this->getDefault(ProductionType::GAME, "mark", 5, associative: $associative);
    }

    public function getTopAll(bool $associative = false): array {
        return [
            "topMovies" => $this->getTopMovies($associative),
            "topShows" => $this->getTopShows($associative),
            "topGames" => $this->getTopGames($associative),
            "topAnimes" => $this->getTopAnimes($associative)
        ];
    }

    public function getProduction(string $id): Production {

        $stmn = $this->database->connect()->prepare("
           select * from production_stats where id = $id
        ");
        $stmn->execute();

        $row = $stmn->fetch(PDO::FETCH_ASSOC);
        return $this->mapToObject($row);
    }

    public function getProductionEntities(string $id, string $userId): array {

        $data = array();
        $stmn = $this->database->connect()->prepare("
            select d.*, a.image_src, (select count(*) from favorite_director fd where fd.id_user = $userId and fd.id_director = d.id) as selected  from productions p
            join production_director pd on p.id = pd.id_production
            join directors d on pd.id_director = d.id
            join attachments a on a.id = d.id_picture
            where p.id = $id
        ");
        $stmn->execute();

        $data["directors"] = $stmn->fetchAll(PDO::FETCH_ASSOC);

        $stmn = $this->database->connect()->prepare("
            select c.*, a2.image_src, (select count(*) from favorite_character fc where fc.id_user = $userId and fc.id_character = c.id) as selected  from productions p
            join production_character pc on p.id = pc.id_production
            join characters c on c.id = pc.id_character
            join actors a on a.id = c.id_actor
            join attachments a2 on a2.id = c.id_picture
            where p.id = $id
        ");
        $stmn->execute();

        $data["characters"] = $stmn->fetchAll(PDO::FETCH_ASSOC);

        $stmn = $this->database->connect()->prepare("
            select s.*, a.image_src, (select count(*) from favorite_studio fs where fs.id_user = $userId and fs.id_studio = s.id) as selected  from productions p
            join production_studio ps on p.id = ps.id_production
            join studios s on s.id = ps.id_studio
            join attachments a on a.id = s.id_picture
            where p.id = 14
        ");
        $stmn->execute();

        $data["studios"] = $stmn->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getTrending(bool $associative = false) {

        $stmn = $this->database->connect()->prepare("
           select * from production_stats 
           where DATE_PART('day', now() - date_produced) < 1000
           order by hearts
        ");
        $stmn->execute();

        $rows = $stmn->fetchAll(PDO::FETCH_ASSOC);

        if ($associative) {
            return $rows;
        } else {
            return $this->mapToObjects($rows);
        }
    }

    public function search(string $sentence) {

        $sentence = strtolower($sentence);

        $stmn = $this->database->connect()->prepare("
            select * from production_stats 
            where lower(title) like '%$sentence%' or lower(synopsis) like '%$sentence%'
            union distinct 
            select p.* from production_stats p
            left join production_director pd on p.id = pd.id_production 
            left join directors d on pd.id_director = d.id 
            where lower(d.name) like '%$sentence%' 
            union distinct 
            select p.* from production_stats p 
            left join production_character pc on p.id = pc.id_production 
            left join characters c on pc.id_character = c.id 
            where lower(c.name) like '%$sentence%' 
            union distinct 
            select p.* from production_stats p 
            left join production_studio ps on p.id = ps.id_production 
            left join studios s on ps.id_studio = s.id 
            where lower(s.name) like '%$sentence%' 
            union distinct 
            select p.* from production_stats p 
            left join production_tag pt on p.id = pt.id_production 
            left join tags t on pt.id_tag = t.id 
            where lower(t.tag) like '%$sentence%'
        ");
        $stmn->execute();

        $result = $stmn->fetchAll(PDO::FETCH_ASSOC);

        $organized = array();
        foreach (ProductionType::VALUES as $value) {
            $organized[$value] = array_values(array_filter($result, function($element) use ($value) {
                return $element["type"] === $value;
            }));
        }
        return $organized;
    }

    private function getDefault(string $type, string $order = "date_produced", int $limit = 10, bool $associative = false): array {

        $stmn = $this->database->connect()->prepare("
           select * from production_stats where type='$type' order by $order desc nulls last limit $limit
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

        $prods = array();
        foreach ($rows as $row) {
            $prods[] = $this->mapToObject($row);
        }

        return $prods;
    }

    private function mapToObject($row): Production {
        return new Production(
            $row["id"],
            $row["title"],
            $row["synopsis"],
            substr($row["date_produced"], 0, 4),
            $row["type"],
            $row["id_poster"] ?: "",
            $row["mark"] ?: 0,
            $row["hearts"],
            $row["image_src"] ?: "posters/default.jpg"
        );
    }
}