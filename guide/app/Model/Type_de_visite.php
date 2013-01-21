<?php 
class Type_de_visite extends AppModel {
	
	
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'visite_id'
			),
			'Type_visite_francai' => array(
					'className'    => 'Type_visite_francai',
					'foreignKey'   => 'type_visite_francai_id'
		 )		
	);
	
	
	
	
	
}





?>