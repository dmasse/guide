<?php
class Point extends AppModel {
	

	var $hasOne = array(
			'Porter_sur' => array(
					'className'    => 'Porter_sur',
					'dependent'    => true
			));
			
	var$hasMany=array(
			'Photo_visite'=>array(
					'className'    => 'Photo_visite',
					'dependent'    => true
			),
			'Mot_cles'=>array(
					'className' =>'Mot_cles',
					'dependent'=> true
					
					)

	);	

}


?>