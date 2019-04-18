<?php
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'image/svg'];
 
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
  echo "Erreur ! Le fichier ne peut pas etre upload.";
  return;
}

 
move_uploaded_file($_FILES['file']['tmp_name'], '../assets/img/' . $_FILES['file']['name']);
 
echo "File uploaded successfully.";
?>