<?php
require ('\View\Connection.php');
// Cr�ation d'un tableau des erreurs 
$erreurs_inscription = array();

// Validation des champs suivant les r�gles en utilisant les donn�es du tableau $_POST
 if ($form_inscription->is_valid($_POST)) {
 	
// On v�rifie si les 2 mots de passe correspondent
 	if ($form_inscription->get_cleaned_data('mdp') != $form_inscription->get_cleaned_data('mdp_verif')) {
	$erreurs_inscription[] = "Les deux mots de passes entr�s sont diff�rents !";
	}

	// Si d'autres erreurs ne sont pas survenues 
	if (empty($erreurs_inscription)) {
	// Traitement du formulaire � faire ici
	} else {
	// On affiche � nouveau le formulaire d'inscription.
	  include ('\View\formulaire_inscription.php'); }
} else {
	// On affiche � nouveau le formulaire d'inscription
	 include ('\View\formulaire_inscription.php'); }
?>
