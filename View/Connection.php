<?php
 include 'Form.php';
// Cr�ation d'un objet Form. // L'identifiant est obligatoire ! 
$mon_form = new Form('POST'); // 'identifiant_unique'
// Ajout d'un champ texte nomm� "prenom" 
$mon_form->add('Text', 'prenom')         
->label('Votre pr�nom SVP');
// Affichage du formulaire
 echo $mon_form;
 ?>