<?php

class Guide extends AppModel {
	var $hasOne = array(
			'User' => array(
					'className'    => 'User',
					'conditions'   => array('User.TypePersonne' => '1'),
					'dependent'    => true
			)
	);
	

	}


?>