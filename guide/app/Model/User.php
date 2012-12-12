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
			)
	);
	

		
	var $hasMany = array(
			'Diplome' => array(
					'className'    => 'Diplome',
					'dependent'    => true
			)
	);
	
public $validate = array(
		
	
		'NOM_USER'=> array(
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'message'=> "la saisie de votre nom est incorrecte"
				      )
						),
		'PRENOM_USER'=> array(
						array(
								'rule'=>'alphanumeric',
								'required'=>true,
								'allowEmpty' =>false,
								'message'=> "la saisie de votre prenom est incorrecte"
			                    )
				),
		'MAIL_USER'=> array(
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
				
		'IDENTIFIANT'=> array(
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
		
	
			
		'TELEPHONE_USER'=>array(
				
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