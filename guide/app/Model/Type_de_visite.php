<?php 
class Type_de_visite extends AppModel {
	
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			),
			'Type_visite_français' => array(
					'className'    => 'Type_visite_français',
					'foreignKey'   => 'Type_visite_français_id'
		 )		
	);
	
	
	
	
	
}





?>