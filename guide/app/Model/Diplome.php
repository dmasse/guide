<?php 
class Diplome extends AppModel {
	var $belongsTo = array(
			'Guide' => array(
					'className'    => 'guide',
					'foreignKey'    => 'guide_id'
			)
	);
	}
	?>