<?php 
class Societe extends AppModel {
	var $hasOne = array(
			'Guide' => array(
					'className'    => 'Guide',
					'dependent'    => true
			)
	);
	
	}
	?>