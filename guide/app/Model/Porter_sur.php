<?php 
class Porter_sur extends AppModel {
	
	
	public $belongsTo = array(
			'Point' => array(
					'className'    => 'Point',
					'foreignKey'   => 'point_id'
			),
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'visite_id'
		 )		
	);
	
	
	
	
	
}





?>