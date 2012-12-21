<?php 


class Visite extends AppModel {

	var $hasMany = array(
			'Visite_audio' => array(
					'className'    => 'Visite_audio',
					'dependent'    => true
			),
			'Visite_papier' => array(
					'className'    => 'Visite_papier',
					'dependent'    => true 
			),
			'Visite_physique' => array(
					'className'    => 'Visite_physique',
					'dependent'    => true
			)		
			
			
			
	);
	


}

?>