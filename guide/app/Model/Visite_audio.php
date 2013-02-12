<?php 
class Visite_audio extends AppModel {
	public $belongsTo = array(
			'Visite' => array(
					'className'    => 'Visite',
					'foreignKey'   => 'visite_id'
			));
	var $hasMany = array(
			'Visite_audio_effectue' => array(
							'className'    => 'Visite_audio_effectue',
							'dependent'    => true
					),
			'Visite_audio_dispenser' =>array (
					'className'=>'Visite_audio_dispenser',
					'dependent'=>true),
			
		  'Trad_titre_desc_visite'=> array(
					'className'=>'Trad_titre_desc_visite',
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