<?php 
class Visite_audio extends AppModel {
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'Visite_id'
			));
	var $hasMany = array(
			'Visite_audio_effectues' => array(
							'className'    => 'Visite_audio_effectues',
							'dependent'    => true
					),
			'Visite_audio_dispensers' =>array (
					'className'=>'Visite_audio_dispensers',
					'dependent'=>true),
			
		  'Trad_titre_desc_visites'=> array(
					'className'=>'Trad_titre_desc_visites',
					'dependent'=>true),
			'Notation_visite' =>array (
					'className'=>'Notation_visite',
					'dependent'=>true
			)
	);	
			
	public $validate = array(

			'duree_audio'=> array(
					array(
							'rule'=>'alphanumeric',
							'required'=>true,
							'message'=> "la saisie de votre nom est incorrecte"
					)
			),
			'prix_audio'=> array(
					array(
							'rule'=>'alphanumeric',
							'required'=>true,
							'allowEmpty' =>false,
							'message'=> "la saisie de votre prenom est incorrecte"
					)
			)
	);
		
}
?>