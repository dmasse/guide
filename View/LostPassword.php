<?php
	//classe nécessaire à l'éxécution du script php
	require 'Form.php';

	//Début du script
	echo 'Formulaire de récupération de mot de passe';
	
	// Création de l'objet formulaire avec pour id form_lost 
	$form_lost = new Form('form_lost');
	// on veut transmettre les données par formulaire
	$form_lost->method('POST');
	// Configuration des champs du formulaire 
	$form_lost
		->add('Text', 'login')
		->label('Login / Pseudo ');
	$form_lost
		->add('Email', 'mail')
		->label('Adresse Mail');
	$form_lost
		->add('Submit', 'submit')
		->value('Réinitialiser mon mot de Passe');
	
	 include('.\controller\LostPassword.php');

 ?>
