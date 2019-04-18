<?php

class Description{
    
    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM description WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->description= $data['description'];


    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getAllDescription() {

        global $db;

        $reqAuthors = $db->prepare('SELECT * FROM description ORDER BY id ASC');
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();

    }

}