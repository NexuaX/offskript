<?php

require_once "Repository.php";

class AttachmentsRepository extends Repository {

    public function addAttachment(string $src) {
        $stmn = $this->database->connect()->prepare("
            insert into attachments values (DEFAULT, '$src')
            on conflict (image_src) do update set image_src = '$src'
            returning id;
        ");
        $stmn->execute();
        return $stmn->fetch(PDO::FETCH_ASSOC);
    }

}