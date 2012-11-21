<?php
 include 'Form.php';
// Création d'un objet Form. // L'identifiant est obligatoire ! 
$form_inscription = new Form('POST'); // 'identifiant_unique'

$form_inscription->add('Radio', 'choixPersonne')  
 ->label('Je suis ')
 ->choices(array('touriste' => 'un touriste',
 		'guide' => 'un guide', ));

// Ajout d'un champ texte nommé "prenom"
$form_inscription->add('Text', 'prenom')         
->label('Prenom ');

$form_inscription->add('Text', 'nom')
->label('Nom');

//champ adresse mail
$form_inscription->add('Text', 'email')
->label('Adresse Mail');

//champ mot de passe plus verification du mot de passe
$form_inscription->add('Password', 'mdp')
->label(" mot de passe ");

$form_inscription->add('Password', 'mdp_verif')                
 ->label("Confirmation mot de passe ");


$form_inscription->add('Text', 'identifiant2')
->label('Choississez un identifiant');

//bouton valider
$form_inscription->add('Submit', 'submit')
->value("m'inscrire !");

// Affichage du formulaire
 echo $form_inscription;
 include ('\controller\Connection.php')
 ?>