<?php
 include 'Form.php';
echo 'Formulaire de r�cup�ration de mot de passe';
// Cr�ation d'un objet Form.// L'identifiant est obligatoire ! 
$form_lost = new Form('POST'); 
// Ajout d'un champ texte nomm� "prenom" 
$form_lost->add('Text', 'login')         
->label('Login / Pseudo ');
$form_lost->add('Text', 'mail')
->label('Adresse Mail');
$form_lost->add('Submit', 'submit');
// Affichage du formulaire
 echo $form_lost;
 ?>
