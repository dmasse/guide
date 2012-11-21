<?php
<<<<<<< HEAD
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
=======
	//classe nécessaire à l'éxécution du script php
	require 'Form.php';
	 
	//Début du script
	echo 'Inscription';
	
	// Création de l'objet formulaire avec pour id POST
	$mon_form = new Form('POST'); 
	
	// Configuration des champs du formulaire
	$mon_form
		->add('Radio', 'choixPersonne')  
		->label('Je suis ')
		->choices(array('touriste'=>'un touriste','guide' =>'un guide'));
	$mon_form
		->add('Text', 'prenom')         
		->label('Prenom ');	
	$mon_form
		->add('Text', 'nom')
		->label('Nom');
	$mon_form
		->add('Text', 'email')
		->label('Adresse Mail');
	$mon_form
		->add('Text', 'identifiant2')
		->label('Choississez un identifiant');
	$mon_form
		->add('Submit', 'submit');
	
	// Affichage du formulaire
	 echo $mon_form;
>>>>>>> branch 'master' of http://github.com/dmasse/guide.git
 ?>
