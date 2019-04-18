<?php

class Information{
    
    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM information WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->nom = $data['nom'];
        $this->prenom= $data['prenom'];
        $this->data_naissance= $data['data_naissance'];
        $this->adresse_mail= $data['adresse_mail'];
        $this->photo= $data['photo'];
        $this->adresse= $data['adresse'];
        $this->ville= $data['ville'];
        $this->mobile= $data['mobile'];


    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getInformation() {

        global $db;

        $reqAuthors = $db->prepare('SELECT * FROM information ORDER BY id ASC');
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();

    }

}