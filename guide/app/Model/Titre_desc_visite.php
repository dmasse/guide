<?php 
class Titre_desc_visite extends AppModel {
	
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			),
			'trad_titre_desc_visite' => array(
					'className'    => 'trad_titre_desc_visite',
					'foreignKey'   => 'trad_titre_desc_visite_id'
			)
				
	);
	

	
	
}





?>