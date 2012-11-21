<?php
	//classe n�cessaire � l'�x�cution du script php
	require 'Form.php';
	 
	//D�but du script
	echo 'Inscription';
	
	// Cr�ation de l'objet formulaire avec pour id POST
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
 ?>