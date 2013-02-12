<?php 
class Visite_papier extends AppModel {
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'visite_id'
			)
			
	);
	
	var $hasMany = array(
			'Visite_papier_effectue' => array(
					'className'    => 'Visite_papier_effectue',
					'dependent'    => true
			),
			'Visite_papier_dispenser' =>array (
					'className'=>'Visite_papier_dispenser',
					'dependent'=>true
			),
			'Notation_visite' =>array (
					'className'=>'Notation_visite',
					'dependent'=>true
			),
			'Trad_titre_desc_visite'=>array(
					'className'=>'Trad_titre_desc_visite',
					'dependent'=>true)
	);
	

	
}





?>