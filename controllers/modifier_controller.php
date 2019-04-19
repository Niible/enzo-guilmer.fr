<?php
// debug($_POST);

if(isset($_POST['modifier'])){
    $Article = Article::getArticle(intval($_POST['modifier']));
}else{
    $a = Article::getLastArticle();
    $id = intval($a['id'])+1;
}

if(isset($_POST['btn-modif'])){
    $id = intval(str_secur($_POST['id']));
    $titre = str_secur($_POST['titre']);
    $date = str_secur($_POST['date']);
    $image = str_secur($_POST['image']);
    $description = str_secur($_POST['description']);
    if($_POST['bool'] == '0'){
        $bool = 0;
        $article = str_secur($_POST['article']);
    }elseif ($_POST['bool'] == '1') {
        $bool = 1;
        $article = str_secur($_POST['article']);
    }else{
        $bool = 2;
        $article = $_POST['file_ipython'];
    }
    $req =$db->prepare("UPDATE article SET titre=?,date=?,image=?,description=?,article=?,latex=?
    WHERE id=?");
    $req->execute([$titre,$date,$image,$description, $article,$bool,$id]);
    header("location:/");
}

if(isset($_POST['btn-aj'])){
    $id = intval(str_secur($_POST['id']));
    $titre = str_secur($_POST['titre']);
    $image = str_secur($_POST['image']);
    $description = str_secur($_POST['description']);
    if($_POST['bool'] == '0'){
        $bool = 0;
        $article = str_secur($_POST['article']);
    }elseif ($_POST['bool'] == '1') {
        $bool = 1;
        $article = str_secur($_POST['article']);
    }else{
        $bool = 2;
        $article = $_POST['file_ipython'];
    }
    $req =$db->prepare("INSERT INTO article (id,titre,image,description,article,latex)
    VALUES (?,?,?,?,?,?)");
    $req->execute([$id,$titre,$image,$description,$article,$bool]);

    header("location:/");
}