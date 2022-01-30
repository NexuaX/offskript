<?php

class FavoriteRepository extends Repository {

    const DIRECTOR = "director";
    const CHARACTER = "character";
    const STUDIO = "studio";

    public function addUserFavoriteDirector(string $userId, string $entityId) {
        $this->addUserFavorite($userId, self::DIRECTOR, $entityId);
    }

    public function addUserFavoriteCharacter(string $userId, string $entityId) {
        $this->addUserFavorite($userId, self::CHARACTER, $entityId);
    }

    public function addUserFavoriteStudio(string $userId, string $entityId) {
        $this->addUserFavorite($userId, self::STUDIO, $entityId);
    }

    public function removeUserFavoriteDirector(string $userId, string $entityId) {
        $this->removeUserFavorite($userId, self::DIRECTOR, $entityId);
    }

    public function removeUserFavoriteCharacter(string $userId, string $entityId) {
        $this->removeUserFavorite($userId, self::CHARACTER, $entityId);
    }

    public function removeUserFavoriteStudio(string $userId, string $entityId) {
        $this->removeUserFavorite($userId, self::STUDIO, $entityId);
    }

    public function addUserFavoriteWithType(string $userId, string $entityId, string $type) {
        $this->addUserFavorite($userId, $type, $entityId);
    }

    public function getUserFavorites(string $userId) {

        $stmn = $this->database->connect()->prepare("
            select fd.*, d.name, a.image_src, 'director' as type from favorite_director fd
            join directors d on d.id = fd.id_director
            join attachments a on d.id_picture = a.id
            where fd.id_user = $userId
            union
            select fc.*, c.name, a2.image_src, 'character' from favorite_character fc
            join characters c on c.id = fc.id_character
            join attachments a2 on c.id_picture = a2.id
            where fc.id_user = $userId
            union
            select fs.*, s.name, a3.image_src, 'studio' from favorite_studio fs
            join studios s on fs.id_studio = s.id
            join attachments a3 on s.id_picture = a3.id
            where fs.id_user = $userId
        ");
        $stmn->execute();

        return $stmn->fetchAll(PDO::FETCH_ASSOC);
    }

    private function addUserFavorite(string $userId, string $entity, string $entityId) {

        $stmn = $this->database->connect()->prepare("
            insert into favorite_$entity values (DEFAULT, $userId, $entityId)
        ");
        $stmn->execute();
    }

    private function removeUserFavorite(string $userId, string $entity, string $entityId) {

        $stmn = $this->database->connect()->prepare("
            delete from favorite_$entity where id_user = $userId and id_$entity = $entityId 
        ");
        $stmn->execute();
    }

}