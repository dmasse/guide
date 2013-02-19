<?php 


class Visite extends AppModel {

	var $hasMany = array(
		
			'Type_de_visite' => array(
					'className'    => 'Type_de_visite',
					'dependent'    => true)
			,
			'Porter_sur' => array(
					'className'    => 'Porter_sur',
					'dependent'    => true))
					
		
					
	;
	var $hasOne = array(
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
			);

	public $belongsTo = array(
			'Guide' => array(
					'className'    => 'Guide',
					'foreignKey'   => 'guide_id'
			));	
}
?>