<?php
 include 'Form.php';
// Création d'un objet Form. // L'identifiant est obligatoire ! 
$mon_form = new Form('POST'); // 'identifiant_unique'

$mon_form->add('Radio', 'choixPersonne')  
 ->label('Je suis ')
 ->choices(array('touriste' => 'un touriste',
 		'guide' => 'un guide', ));

// Ajout d'un champ texte nommé "prenom"
$mon_form->add('Text', 'prenom')         
->label('Prenom ');

$mon_form->add('Text', 'nom')
->label('Nom');

$mon_form->add('Text', 'email')
->label('Adresse Mail');

$mon_form->add('Text', 'identifiant2')
->label('Choississez un identifiant');

$mon_form->add('Submit', 'submit');
// Affichage du formulaire
 echo $mon_form;
 ?>