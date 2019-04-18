<?php 
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
    if($login == "root" && $password == "root"){
        session_start();
        $_SESSION['login'] = "root";
        header("location:/overview");
    }
};