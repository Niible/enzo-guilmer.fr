<?php

// debug($db);
$Experience = Experience::getAllExperience('DESC');
$Description = Description::getAllDescription();
$Competence = Competence::getAllCompetence();
$Projet = Projet::getAllProjet();
$Langue = Langue::getAllLangue();
$Information = Information::getInformation();


$info = $Information[0];
$img = $info['photo'];
$info = $info['prenom'].' '.$info['nom'].'<br>Date de naissance: '.$info['date_naissance'].'<br>email: '.$info['adresse_mail'].' - Mobile: '.$info['mobile'].'<br>'.$info['adresse'].' '.$info['ville'];
$i = $Information[0];
$img = $i['photo'];
$des = $Description[0];
$desc = $des['description'];
$comp = $Competence;
$exp = $Experience;
$pro = $Projet;
$lan = $Langue;