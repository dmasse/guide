<?php
	//classe nécessaire à l'éxécution du script php
	require 'Form.php';

	//Début du script
	echo 'Formulaire de récupération de mot de passe';
	
	// Création de l'objet formulaire avec pour id POST 
	$form_lost = new Form('POST');
	
	// Configuration des champs du formulaire 
	$form_lost
		->add('Text', 'login')
		->label('Login / Pseudo ');
	$form_lost
		->add('Text', 'mail')
		->label('Adresse Mail');
	$form_lost
		->add('Submit', 'submit');
	
	// Affichage du formulaire
	 echo $form_lost;
 ?>
