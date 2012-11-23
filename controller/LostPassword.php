<?php

if ($form_lost->is_valid($_POST))
{
	// On récupère les valeurs
	list($login, $mail) = $form_lost->get_cleaned_data('login', 'mail');
	// Et on les affiche
	echo 'Vous êtes '.$login.' et votre mail est "'.$mail.'".';
}
else
{
	// Sinon on affichage le formulaire jusqu'à ce que ça soit valide
	echo $form_lost;
}