<?php

if ($form_lost->is_valid($_POST))
{
	// On r�cup�re les valeurs
	list($login, $mail) = $form_lost->get_cleaned_data('login', 'mail');
	// Et on les affiche
	echo 'Vous �tes '.$login.' et votre mail est "'.$mail.'".';
}
else
{
	// Sinon on affichage le formulaire jusqu'� ce que �a soit valide
	echo $form_lost;
}