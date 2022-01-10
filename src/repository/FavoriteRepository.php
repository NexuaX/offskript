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