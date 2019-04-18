<?php 

$admin = Admin::getAdmin();

if(isset($_SESSION['login'])){
    if($_SESSION['login'] == "root"){
        header("location:/overview");
    }else{
        header("location:/");
    }
}

if(isset($_POST['login']) && isset($_POST['password'])){
    $login = str_secur($_POST['login']);
    $password = str_secur($_POST['password']);
    if($login == $admin[0]['login'] && $password == $admin[0]['mdp']){
        session_start();
        $_SESSION['login'] = "root";
        header("location:/overview");
    }else{
    }
};