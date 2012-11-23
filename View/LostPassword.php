<?php
	//classe n�cessaire � l'�x�cution du script php
	require 'Form.php';

	//D�but du script
	echo 'Formulaire de r�cup�ration de mot de passe';
	
	// Cr�ation de l'objet formulaire avec pour id form_lost 
	$form_lost = new Form('form_lost');
	// on veut transmettre les donn�es par formulaire
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
		->value('R�initialiser mon mot de Passe');
	
	 include('.\controller\LostPassword.php');

 ?>
