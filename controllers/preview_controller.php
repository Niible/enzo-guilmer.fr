<?php 
include_once '_classes/Experience.php';
include_once '_classes/Description.php';
include_once '_classes/Competence.php';

$Experience = Experience::getAllExperience();
$Description = Description::getAllDescription();
$Competence = Competence::getAllCompetence();
$Projet = Projet::getAllProjet();
$Langue = Langue::getAllLangue();
$Information = Information::getInformation();

if(isset($_POST)){
    if(isset($_POST['information_preview'])){
        $info = $Information[0];
        $img = $info['photo'];
        $info = $info['prenom'].' '.$info['nom'].'<br>Date de naissance: '.$info['date_naissance'].'<br>email: '.$info['adresse_mail'].' - Mobile: '.$info['mobile'].'<br>'.$info['adresse'].' '.$info['ville'].'<br>'.'lien LinKedIn : <a target="_blank" href="'.$info['linkedin'].'">'.$info['linkedin'].'</a>';
                    
    }
    if(isset($_POST['description_preview'])){
        $i = $Information[0];
        $img = $i['photo'];
        $des = $Description[0];
        $desc = $des['description'];
    }
    if(isset($_POST['competence_preview'])){
        $comp = $Competence;
    }
    if(isset($_POST['experience_preview'])){
        $exp = $Experience;
    }
    if(isset($_POST['projet_preview'])){
        $pro = $Projet;
    }
    if(isset($_POST['langue_preview'])){
        $lan = $Langue;
    }
}