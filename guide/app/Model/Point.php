<?php
class Point extends AppModel {
	

	var $hasOne = array(
			'Porter_sur' => array(
					'className'    => 'Porter_sur',
					'dependent'    => true
			));
			
	var$hasMany=array(
			
			        'Mot_cle'=>array(
					'className' =>'Mot_cle',
			         'dependent'=> true
					
				)

	);	

}


?>