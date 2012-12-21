<?php 
class Visite_papier extends AppModel {
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			)
			
	);
	
	
	
	
	
}





?>