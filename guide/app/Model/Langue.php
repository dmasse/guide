<?php 
class Langue extends AppModel {
	var $hasMany = array(
			'User' => array(
					'className'    => 'User',
					'dependent'    => true
			),
			'Trad_titre_desc_visite' => array(
					'className'    => 'Trad_titre_desc_visite',
					'dependent'    => true
			),
			'Trad_type_visite' => array(
					'className'    => 'Trad_type_visite',
					'dependent'    => true)
	);
	
	
	
	//permet de définir ce que l'on va afficher dans la liste déroulante
	var $displayField = 'nom_langue';
	}
	?>