<?php
 include 'Form.php';
// Création d'un objet Form. // L'identifiant est obligatoire ! 
$mon_form = new Form('POST'); // 'identifiant_unique'
// Ajout d'un champ texte nommé "prenom" 
$mon_form->add('Text', 'prenom')         
->label('Prénom ');
$mon_form->add('Text', 'nom')
->label('Nom');
$mon_form->add('Text', 'adresseMail')
->label('Adresse Mail');
$mon_form->add('Text', 'identifiant2')
->label('Choississez un identifiant');
$mon_form->add('Submit', 'submit');
// Affichage du formulaire
 echo $mon_form;
 ?>