<?php

class Guide extends AppModel {
	var $hasOne = array(
			'User' => array(
					'className'    => 'User',
				    'conditions'   =>array('user.TYPE_PERSONNE'=>'1'),
					'dependent'    => true
			)
	);
	
	var $hasMany = array(
			'Diplome' => array(
					'className'    => 'Diplome',
					'dependent'    => true
			)
	);
	
	
	
	}


?>