<?php 
class UserController extends AppController{
	
	var $name="User";
	var $uses = array("User");//precise le modél à utiliser
	

	
	function Registration(){//renvoie à la vue registration
		//verifier si les données ont été postées 
		if ($this->request->is('post')){
			$d= $this->request->data;//empeche le piratage
		    $d['User']['id'] = null;//permet d'etre sur d'avoir une insertion et non une modification attention à changer en fonction de la base de données
			
if (!empty($d['User']['Mdp'])){
	$d['User']['Mdp']=Security::hash($d['User']['Mdp']);//cryptage du mot de passe

	
}
		   if ($this->User->save($d,true,array('NomUser','PrenomUser','MailUser','Identifiant','Mdp'))){//sauvegarder les données dans la base de données
//generation du lein d'activation

		   	$link=array('controller'=>'users','action'=>'activate',$this->User->id.'-'.md5($d['User']['Mdp']));
		   	
		   	//permet de gerer l'envoie pour confirmer l'inscription
            App::uses('CakeEmail','Network/Email');
		   	$mail = new CakeEmail();
		   	$mail->from('noreply@localhost.com')
		   	   ->to($d['User']['MailUser'])
		   	   ->subject('Test::Inscription')
		   	   ->emailFormat('html')
		   	   ->template('registration')
		   	   ->viewVars(array('NomUser'=>$d['User']['NomUser'],'PrenomUser'=>$d['User']['PrenomUser'],'link'=>$link))
		   	   ->send();
			$this->Session->setFlash("Votre compte a bien été créé","notif");
			}else{
				$this->Session->setFlash("Merci de corriger vos erreurs","notif",array('type'=>'error'));
			}
			
			
		}
		}
			
			
			
	}	
	


?>