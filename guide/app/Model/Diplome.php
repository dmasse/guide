<?php 
class Diplome extends AppModel {
	var $belongsTo = array(
			'Guide' => array(
					'className'    => 'Guide',
					'foreignKey'    => 'guide_id'
			)
	);
	}
	?>