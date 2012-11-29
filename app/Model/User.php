<?php 

class User extends AppModel {
	
	var $name="User";
public $validate = array(
	
		'NomUser'=> array(
				array(
						'rule'=>'alphanumeric',
						'required'=>true,
						'allowEmpty' =>false,
						'message'=> "la saisie de votre Nom est incorrecte"
				      )
						),
		'PrenomUser'=> array(
						array(
								'rule'=>'alphanumeric',
								'required'=>true,
								'allowEmpty' =>false,
								'message'=> "la saisie de votre Prenom est incorrecte"
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
						'message'=>'cet email est deja utilisé'
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
		'Mpd'=> array(								
						'rule'=>'notEmpty',
					     'message'=>'vous devez entrer un mot de passe',
						'allowEmpty'=>false
					  )			
						
			     );
		
	
}

?>