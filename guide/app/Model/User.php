<?php 

class User extends AppModel {
	

	var $belongsTo = array(
			'guide' => array(
					'className'    => 'guide',
					'foreignKey'    => 'guide_id'
			)
	);
	
	

	
public $validate = array(
		
	
		'NomUser'=> array(
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'message'=> "la saisie de votre nom est incorrecte"
				      )
						),
		'PrenomUser'=> array(
						array(
								'rule'=>'alphanumeric',
								'required'=>true,
								'allowEmpty' =>false,
								'message'=> "la saisie de votre prenom est incorrecte"
			                    )
				),
		'MailUser'=> array(
						array(
								'rule'=>'email',
								'required'=>true,
								'allowEmpty' =>false,
								'message'=> "la saisie de votre email est incorrecte"
						     ),
				array(
						'rule'=>'isUnique',
						'message'=>'cet email est deja utilisÃ©'
				         )
				),
				
		'Identifiant'=> array(
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
		
	
			
		'TelephoneUser'=>array(
				
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'allowEmpty' =>false,
						'message'=> "la saisie de votre numéro de téléphone n'est pas correcte"
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