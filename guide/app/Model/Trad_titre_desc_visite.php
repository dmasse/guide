<?php 
class Trad_titre_desc_visite extends AppModel {
	
	public $belongsTo = array(
			'Visite_audio' => array(
					'className'    => 'Visite_audio',
					'foreignKey'   => 'visite_audio_id'
			),
			'Visite_papier' => array(
					'className'    => 'Visite_papier',
					'foreignKey'   => 'visite_papier_id'
			),
	
			'Visite_physique' => array(
					'className'    => 'Visite_physique',
					'foreignKey'   => 'visite_physique_id'
			),
		
		
				
			'Langue'=> array(
					'className'=>'Langue',
					'foreignKey' =>'langue_id')
	);
	
	
	
}


?>