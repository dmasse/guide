<?php 

class User extends AppModel {
	
//gestion des relations
	var $belongsTo = array(
			'guide' => array(
					'className'    => 'guide',
					'foreignKey'    => 'guide_id'
			),
			
			'Langue' => array(
					'className'    => 'langue',
					'foreignKey'    => 'langue_id'
			),
			
	);
	

		
	
	
public $validate = array(
		
	
		'nom_user'=> array(
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'message'=> "la saisie de votre nom est incorrecte"
				      )
						),
		'prenom_user'=> array(
						array(
								'rule'=>'alphanumeric',
								'required'=>true,
								'allowEmpty' =>false,
								'message'=> "la saisie de votre prenom est incorrecte"
			                    )
				),
		'mail_user'=> array(
						array(
								'rule'=>'email',
								'required'=>true,
								'allowEmpty' =>false,
								'message'=> "la saisie de votre email est incorrecte"
						     ),
				array(
						'rule'=>'isUnique',
						'message'=>'cet email est deja utilisé'
				         )
				),
				
		'identifiant'=> array(
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'allowEmpty' =>false,
						'message'=> "la saisie de votre Identifiant est incorrecte"
						),
				array (
						'rule'=>'isUnique',
						'message'=>'cet identifiant est deja pris'
						),
							),
		
	
			
		'telephone_user'=>array(
				
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'allowEmpty' =>false,
						'message'=> "la saisie de votre num�ro de t�l�phone n'est pas correcte"
				),
				array (
						'rule'=>'isUnique',
						'message'=>'ce numero de telephone est deja pris'
				),
				 array(
						'rule' => array('minLength', '10'),
						'message' => 'Taille minimum de 10 chiffres'
				),
				
				
				
				)
			     );
		
	
}

?>