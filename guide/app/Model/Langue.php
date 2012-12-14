<?php 
class Langue extends AppModel {
	var $hasMany = array(
			'User' => array(
					'className'    => 'User',
					'dependent'    => true
			)
	);
	var $displayField = 'nom_langue';
	}
	?>