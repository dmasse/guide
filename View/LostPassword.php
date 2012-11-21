<?php
 include 'Form.php';
echo 'Formulaire de récupération de mot de passe';
// Création d'un objet Form.// L'identifiant est obligatoire ! 
$form_lost = new Form('POST'); 
// Ajout d'un champ texte nommé "prenom" 
$form_lost->add('Text', 'login')         
->label('Login / Pseudo ');
$form_lost->add('Text', 'mail')
->label('Adresse Mail');
$form_lost->add('Submit', 'submit');
// Affichage du formulaire
 echo $form_lost;
 ?>
