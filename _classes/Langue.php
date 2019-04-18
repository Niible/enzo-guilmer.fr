<?php

class Langue{
    
    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM langue WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->nom = $data['langue'];
        $this->description= $data['niveau'];
    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getAllLangue() {

        global $db;

        $reqAuthors = $db->prepare('SELECT * FROM langue ORDER BY id ASC');
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();

    }

}