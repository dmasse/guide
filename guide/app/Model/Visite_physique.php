<?php 
class Visite_physique extends AppModel {
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'visite_id'
			)
				
	);
	
	var $hasMany = array(
			'date_visite_physiques' => array(
					'className'    => 'User',
					'dependent'    => true
			),
			
					'Visite_physique_effectues' => array(
							'className'    => 'Visite_physique_effectues',
							'dependent'    => true),
					'Visite_physique_dispensers' =>array (
							'className'=>'Visite_physique_dispensers',
							'dependent'=>true),
						
					'Trad_titre_desc_visites'=> array(
							'className'=>'Trad_titre_desc_visites',
							'dependent'=>true),
					'Notation_visite' =>array (
							'className'=>'Notation_visite',
							'dependent'=>true
					)
			);
	

	
	
	
}





?>