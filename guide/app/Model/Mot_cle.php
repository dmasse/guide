
<?php
class Mot_cle extends AppModel {

	public $belongsTo = array(
			'Point_interet' => array(
					'className'    => 'Guide',
					'foreignKey'   => 'point_interet_id'
			),
			'Mot_cle_francai' => array(
					'className'    => 'Mot_cle_francai',
					'foreignKey'   => 'Mot_cle_francai_id'
			),
			
			);	
	
	
	
	
	
}
?>