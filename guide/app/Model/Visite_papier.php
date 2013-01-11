<?php 
class Visite_papier extends AppModel {
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			)
			
	);
	
	var $hasMany = array(
			'Visite_papier_effectues' => array(
					'className'    => 'Visite_papier_effectues',
					'dependent'    => true
			),
			'Visite_papier_dispensers' =>array (
					'className'=>'Visite_papier_dispensers',
					'dependent'=>true
			),
			'Notation_visite' =>array (
					'className'=>'Notation_visite',
					'dependent'=>true
			),
			'Trad_titre_desc_visites'=>array(
					'className'=>'Trad_titre_desc_visites',
					'dependent'=>true)
	);
	

	
}





?>