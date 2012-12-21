<?php 


class VisitesController extends AppController{

	
	var $components = array('Auth');
	//var $primaryKey = 'IdUser';//changement du nom de la clé primaire

	function Addvisit(){//renvoie à la vue registration
		//verifier si les données ont été postées
		$this->set('typeVisite',$this->Visite->Type_de_visites->find('list',array('field'=>'Type_de_visites.type_visite_français_id')));
		if ($this->request->is('post')){
			$d= $this->request->data;//empeche le piratage stocker les données dans un tableau
			$d['User']['id'] = null;//permet d'etre sur d'avoir une insertion et non une modification attention à changer en fonction de la base de données
	
		
	
	
		
		if ($this->User->save($d,true,array('type_personne','nom_user','prenom_user','mail_user','identifiant','mdp', 'cgu','optin_b','optin_n','civilite'))){//sauvegarder les données dans la base de données
				//generation du lien d'activation
							
		
		$this->request->data= array();//permet de vider tous les champs on peut aussi faire une redirection
		$this->Session->setFlash("Votre compte a bien été créé, valider votre inscription grace au mail de confirmation","notif");
		$this->redirect('/');//redirection vers home
							
					}else{
						$this->Session->setFlash("Merci de corriger vos erreurs","message_error");
						//Si les mots de passe ne sont pas les memes
						
					}
		}
			}
		}
?>