<?php

class Competence{
    
    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM competence WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->competence = $data['competence'];
        $this->niveau= $data['niveau'];
    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getAllCompetence() {

        global $db;

        $reqAuthors = $db->prepare('SELECT * FROM competence ORDER BY id ASC');
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();

    }

}