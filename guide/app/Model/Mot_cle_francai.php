<?php
class Mot_cle_francai extends AppModel {

	
	var $hasOne = array(
			'Mot_cle' => array(
					'className'    => 'Mot_cle',
					'dependent'    => true
			));
	
	var $displayField = 'mot_cle_francais';	
	
}
?>