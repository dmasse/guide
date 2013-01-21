<?php 
class Date_visite_physique extends AppModel {
	var $belongsTo = array(
			'Visite_physique' => array(
					'className'    => 'Visite_physique',
					'foreignKey'    => 'visite_physique_id'
			)
	);
	}
	?>