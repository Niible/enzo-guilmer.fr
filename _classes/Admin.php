<?php

class Admin
{

    public $id;
    public $login;
    public $mdp;


    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqArticle = $db->prepare('
            SELECT *
            FROM admin 
            WHERE id = ?
        ');
        $reqAdmin->execute([$id]);
        $data = $reqAdmin->fetch();

        $this->id = $id;
        $this->login = $data['login'];
        $this->mdp = $data['mdp'];


    }

    static function getAdmin() {

        global $db;
    
        $reqArticles = $db->prepare('
            SELECT *
            FROM admin 
            where id = 1
        ');
        $reqArticles->execute([]);
       
        return $reqArticles->fetchAll();
    }


}