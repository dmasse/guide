<?php 
class Rib_guide extends AppModel {
	var $hasOne = array(
			'Guide' => array(
					'className'    => 'Guide',
					'dependent'    => true
			)
	);
	
	}
	?>