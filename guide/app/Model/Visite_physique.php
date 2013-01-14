<?php 
class Visite_physique extends AppModel {
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'visite_id'
			)
				
	);
	
	var $hasMany = array(
			'date_visite_physique' => array(
					'className'    => 'date_visite_physique',
					'dependent'    => true
			),
			
					'Visite_physique_effectue' => array(
							'className'    => 'Visite_physique_effectue',
							'dependent'    => true),
					'Visite_physique_dispensers' =>array (
							'className'=>'Visite_physique_dispensers',
							'dependent'=>true),
						
					'Trad_titre_desc_visite'=> array(
							'className'=>'Trad_titre_desc_visite',
							'dependent'=>true),
					'Notation_visite' =>array (
							'className'=>'Notation_visite',
							'dependent'=>true
					)
			);
	

	
	
	
}





?>