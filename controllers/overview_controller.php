<?php 

$Experience = Experience::getAllExperience();
$Description = Description::getAllDescription();
$Competence = Competence::getAllCompetence();
$Projet = Projet::getAllProjet();
$Langue = Langue::getAllLangue();
$Information = Information::getInformation();

if(isset($_POST['experience_supprimer'])){
    $id = str_secur(intval($_POST['experience_supprimer']));
    $req = $db->prepare("DELETE FROM experience WHERE id=?");
    $req->execute([$id]);
    header("location:/overview");
}

if(isset($_POST['competence_supprimer'])){
    $id = str_secur(intval($_POST['competence_supprimer']));
    $req = $db->prepare("DELETE FROM competence WHERE id=?");
    $req->execute([$id]);
    header("location:/overview");
}

if(isset($_POST['projet_supprimer'])){
    $id = str_secur(intval($_POST['projet_supprimer']));
    $req = $db->prepare("DELETE FROM projet WHERE id=?");
    $req->execute([$id]);
    header("location:/overview");
}

if(isset($_POST['langue_supprimer'])){
    $id = str_secur(intval($_POST['langue_supprimer']));
    $req = $db->prepare("DELETE FROM langue WHERE id=?");
    $req->execute([$id]);
    header("location:/overview");
}