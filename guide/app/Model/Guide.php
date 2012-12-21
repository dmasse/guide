<?php

class Guide extends AppModel {
	var $hasOne = array(
			'User' => array(
					'className'    => 'User',
					'conditions'   => array('User.TypePersonne' => '1'),
					'dependent'    => true
			)
	);
	
	public $belongsTo = array(
			'Societe' => array(
					'className'    => 'Societe',
					'foreignKey'   => 'societe_id'
			),
			'Rib_guide' => array(
					'className'    => 'rib_guide',
					'foreignKey'   => 'rib_guide_id'
			)
	);
	}


?>