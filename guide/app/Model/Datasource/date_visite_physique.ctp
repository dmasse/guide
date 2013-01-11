<?php 

class date_visite_physiques extends AppModel {
	public $belongsTo = array(
			'Visite_physiques' => array(
					'className'    => 'Visite_physiques',
					'foreignKey'   => 'Visite_physique_id'
			)
	);
	

?>