<?php 
class Societe extends AppModel {
	var $hasOne = array(
			'User' => array(
					'className'    => 'User',
					'dependent'    => true
			)
	);
	
	}
	?>