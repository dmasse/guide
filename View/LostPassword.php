<?php
	//classe n�cessaire � l'�x�cution du script php
	require 'Form.php';

	//D�but du script
	echo 'Formulaire de r�cup�ration de mot de passe';
	
	// Cr�ation de l'objet formulaire avec pour id POST 
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
