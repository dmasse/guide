<?php
 include 'Form.php';
// Création d'un objet Form. // L'identifiant est obligatoire ! 
$mon_form = new Form('POST'); // 'identifiant_unique'
// Ajout d'un champ texte nommé "prenom" 
$mon_form->add('Text', 'prenom')         
->label('Votre prénom SVP');
// Affichage du formulaire
 echo $mon_form;
 ?>