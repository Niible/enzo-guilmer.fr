<?php

class Experience{
    
    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM experience WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->experience = $data['experience'];
        $this->description= $data['description'];
        $this->date_debut= $data['date_debut'];
        $this->date_fin= $data['date_fin'];

    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getAllExperience($des='ASC') {

        global $db;
        if($des == 'ASC'){
        $reqAuthors = $db->prepare('SELECT * FROM experience ORDER BY id ASC');
        }else{
        $reqAuthors = $db->prepare('SELECT * FROM experience ORDER BY id DESC');
        }
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();

    }

}