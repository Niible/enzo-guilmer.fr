<?php 

$Experience = Experience::getAllExperience();
$Description = Description::getAllDescription();
$Competence = Competence::getAllCompetence();
$Projet = Projet::getAllProjet();
$Langue = Langue::getAllLangue();
$Information = Information::getInformation();


if(isset($_POST['information_modifier'])){
    $info = $Information[0];
    $prenom = $info['prenom'];
    $nom = $info['nom'];
    $date = $info['date_naissance'];
    $email = $info['adresse_mail'];
    $mobile = $info['mobile'];
    $adresse = $info['adresse'];
    $ville = $info['ville'];
    $linkedin = $info['linkedin'];
}


if(isset($_POST['description_modifier'])){
    $desc = $Description[0];
    $content = $desc['description'];
    $titre = 'Description';
}

if(isset($_POST['experience_modifier'])){
    $exp = $Experience[intval($_POST['experience_modifier'])-1];
    $experience = $exp['experience'];
    $description = $exp['description'];
    $date_debut = $exp['date_debut'];
    $date_fin = $exp['date_fin'];

}

if(isset($_POST['competence_modifier'])){
    $comp = $Competence[intval($_POST['competence_modifier'])-1];
    $competence = $comp['competence'];
    $niveau = $comp['niveau'];
}

if(isset($_POST['projet_modifier'])){
    $pro = $Projet[intval($_POST['projet_modifier'])-1];
    $nom = $pro['nom'];
    $description = $pro['description'];
    $image = $pro['image'];
    $lien = $pro['lien'];
}

if(isset($_POST['langue_modifier'])){
    $lan = $Langue[intval($_POST['langue_modifier'])-1];
    $langue = $lan['langue'];
    $niveau = $lan['niveau'];
}




if(isset($_POST['btn-pro']) || (isset($_POST['btn-pro-aj']))){
    if(!empty($_POST['nom'])){
            $nom = str_secur($_POST['nom']);
            $desc = str_secur($_POST['description']);
            $image = str_secur($_POST['image']);
            $lien = str_secur($_POST['lien']);
        if(isset($_POST['btn-pro'])){
            $id = intval($_POST['btn-pro']);

            $req = $db->prepare("UPDATE projet SET nom=?,description=?,image=?,lien=? WHERE id=?");
            $req->execute([$nom,$desc,$image,$lien,$id]);
        }else{
            $id = intval($_POST['btn-pro-aj']);
            $req = $db->prepare("INSERT INTO projet (id,nom,description,image,lien)
            VALUES (?,?,?,?,?)");
            $req->execute([$id,$nom,$desc,$image,$lien]);
        }
            header("location:/overview");
    }
}


if(isset($_POST['btn-lan']) || isset($_POST['btn-lan-aj'])){
    if(!empty($_POST['niveau'])){
        $langue = str_secur($_POST['langue']);
        $niveau = str_secur($_POST['niveau']);
        if(isset($_POST['btn-lan'])){
            $id = intval($_POST['btn-lan']);
            $req = $db->prepare("UPDATE `langue` SET `langue`=?,`niveau`=? WHERE `id`=?");
            $req->execute([$langue,$niveau,$id]);
        }else{
            $id = intval($_POST['btn-lan-aj']);
            $req = $db->prepare("INSERT INTO `langue` (id,langue,niveau)
            VALUES (?,?,?)");
            $req->execute([$id,$langue,$niveau]);
        }
            header("location:/overview");
    }
}




// Envoyer
if(isset($_POST['btn-photo']) && isset($_POST['file'])){
    if(!empty($_POST['file'])){
        if($_POST['file'] != $Information[0]['photo']){
            $photo = str_secur($_POST['file']);
            $id = 1;
        
            $req = $db->prepare("UPDATE information SET photo=? WHERE id=?");
            $req->execute([$photo,$id]);
            header("location:/overview");

        }
    }
}

if(isset($_POST['btn-info'])){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['date']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['adresse']) && !empty($_POST['ville'])){

        $id = 1;
        $prenom = str_secur($_POST['prenom']);
        $nom = str_secur($_POST['nom']);
        $date = str_secur($_POST['date']);
        $email = str_secur($_POST['email']);
        $mobile = str_secur($_POST['mobile']);
        $adresse = str_secur($_POST['adresse']);
        $ville = str_secur($_POST['ville']);
        $linkedin = str_secur($_POST['linkedin']);

        $req = $db->prepare("UPDATE information SET nom=?,prenom=?,date_naissance=?,adresse_mail=?,adresse=?,ville=?,mobile=?,linkedin=? WHERE id=?");
        $req->execute([$nom,$prenom,$date,$email,$adresse,$ville,$mobile,$linkedin,$id]);
        header("location:/overview");

    }
    
}

if(isset($_POST['btn-desc']) && isset($_POST['content'])){
    if(!empty($_POST['content'])){

            $content = str_secur($_POST['content']);
            $id = 1;
        
            $req = $db->prepare("UPDATE description SET description=? WHERE id=?");
            $req->execute([$content,$id]);
            header("location:/overview");
    }
}



if(isset($_POST['btn-exp']) || isset($_POST['btn-exp-aj'])){
    if(!empty($_POST['experience']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])){
        if(!empty($_POST['experience'])){
            $exp = str_secur($_POST['experience']);
            $desc = str_secur($_POST['description']);
            $date_debut = str_secur($_POST['date_debut']);
            $date_fin = str_secur($_POST['date_fin']);
            if(isset($_POST['btn-exp'])){
                $id = intval($_POST['btn-exp']);
                $req = $db->prepare("UPDATE experience SET experience=?,description=?,date_debut=?,date_fin=? WHERE id=?");
                $req->execute([$exp,$desc,$date_debut,$date_fin,$id]);

            }else{
                $id = intval($_POST['btn-exp-aj']);
                $req = $db->prepare("INSERT INTO experience (id,experience,description,date_debut,date_fin) 
                VALUES(?,?,?,?,?)");
                $req->execute([$id,$exp,$desc,$date_debut,$date_fin]);
            }
            header("location:/overview");
        }
    }
}


if(isset($_POST['btn-comp']) || isset($_POST['btn-comp-aj'])){
    if(!empty($_POST['niveau'])){
        $niveau = str_secur(intval($_POST['niveau']));

        if(isset($_POST['btn-comp'])){
            $id = intval($_POST['btn-comp']);
            $req = $db->prepare("UPDATE competence SET niveau=? WHERE id=?");
            $req->execute([$niveau,$id]);
        }else{
            $id = intval($_POST['btn-comp-aj']);
            $competence = str_secur($_POST['nom']);
            $req = $db->prepare("INSERT INTO competence (id,competence, niveau)
            VALUES (?,?,?)");
            $req->execute([$id, $competence,$niveau]);
        }
        
            
            header("location:/overview");
    }
}