<?php 
class Visite_physique extends AppModel {
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			)
				
	);
	
	
	
	
	
}





?>