<?php

class Guide extends AppModel {


	var $hasOne = array(
			'User' => array(
					'className'    => 'User',
					'conditions'   => array('User.type_personne' => '1'),
					'dependent'    => true
			),
			'Diplome' => array(
					'className'    => 'Diplome',
					'dependent'    => true)
		
	);
	var $hasMany = array(
			'Visite' => array(
					'className'    => 'Visite',
					'dependent'    => true
			));
	
	public $belongsTo = array(
			'Societe' => array(
					'className'    => 'Societe',
					'foreignKey'   => 'societe_id'
			),
			'Rib_guide' => array(
					'className'    => 'Rib_guide',
					'foreignKey'   => 'rib_guide_id'
			)
	);
	}


?>