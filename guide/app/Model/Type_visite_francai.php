<?php 
class Type_visite_francai extends AppModel {
	var $hasMany = array(
			'Type_de_visite' => array(
					'className'    => 'Type_de_visite',
					'dependent'    => true
			));
	var $displayField = 'type_visite_francai';
	
}

?>