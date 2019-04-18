<?php

class Projet{
    
    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM projet WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->nom = $data['nom'];
        $this->description= $data['description'];
        $this->image=$data['image'];
    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getAllProjet() {

        global $db;

        $reqAuthors = $db->prepare('SELECT * FROM projet ORDER BY id ASC');
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();

    }

}