<?php 

class User extends AppModel {
	
	
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
		
	
		
		'mpd'=> array(							
				'regle1' => array(
						'rule' => 'notEmpty',
						'message' => 'ce champs est obligatoire'
				),				
				'regle2' => array(
						'rule' => array('minLength', '8'),
						'message' => 'Taille minimum de 8 caractères'
				),						
				'required'=>true,//peut etre ça qui beug
				'message'=>'vous devez entrer un mot de passe',
				'allowEmpty'=>false
		)	
		
			     );
		
	
}

?>