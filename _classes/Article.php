<?php

class Article
{

    public $id;
    public $title;
    public $content;
    public $date;
    public $category;

    /**
     * Articles constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqArticle = $db->prepare('
            SELECT a.*
            FROM articles a 
            WHERE a.id = ?
        ');
        $reqArticle->execute([$id]);
        $data = $reqArticle->fetch();

        $this->id = $id;
        $this->title = $data['titre'];
        $this->content = $data['description'];
        $this->date = $data['date'];
        $this->image = $data['image'];

    }

    /**
     * Envoie tous les articles
     * @return array
     */
    static function getAllArticle() {

        global $db;
    
        $reqArticles = $db->prepare('
            SELECT a.*
            FROM article a 
            WHERE a.id != (select max(id) from article)
            ORDER BY id DESC
        ');
        $reqArticles->execute([]);
       
        return $reqArticles->fetchAll();
    }

    static function getLastArticle() {

        global $db;

        $reqArticle = $db->prepare('
            SELECT a.*
            FROM article a 
            ORDER BY id DESC
            LIMIT 1
        ');
        $reqArticle->execute([]);
        
        return $reqArticle->fetch();
    }

    static function getArticle($id) {

        global $db;

        $reqArticle = $db->prepare('
            SELECT a.*
            FROM article a 
            WHERE a.id = ?
            ');
            $reqArticle->execute([str_secur($id)]);

        return $reqArticle->fetch();
    }

    static function getPageArticles($pageid, $nbarticle, $articles) {

        $i = 0;
        $return_articles = array();
        for($i; $i < sizeof($articles); $i++){
            if(ceil(($i+1)/$nbarticle)==$pageid){
                array_push($return_articles,$articles[$i]);
            }
        };
        return $return_articles;
        
    }

}