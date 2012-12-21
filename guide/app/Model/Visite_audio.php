<?php 
class Visite_audio extends AppModel {
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			)
	);
	
	
	
	
}





?>