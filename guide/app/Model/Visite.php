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
					'dependent'    => true)
			),
		
			'Type_de_visites' => array(
					'className'    => 'Type_de_visites',
					'dependent'    => true)
			),
			'Porter_surs' => array(
					'className'    => 'Porter_surs',
					'dependent'    => true)
					),
					
	;

	public $belongsTo = array(
			'Guide' => array(
					'className'    => 'Guide',
					'foreignKey'   => 'guide_id'
			));	
}
?>