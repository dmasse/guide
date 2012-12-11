<?php 
class UsersController extends AppController{
	
	//var $name="User";
	var $uses = array("User");//precise le modél à utiliser
	var $components = array('Auth');
	//var $primaryKey = 'IdUser';//changement du nom de la clé primaire

	
function Registration(){//renvoie à la vue registration
		//verifier si les données ont été postées 
if ($this->request->is('post')){
$d= $this->request->data;//empeche le piratage stocker les données dans un tableau
$d['User']['id'] = null;//permet d'etre sur d'avoir une insertion et non une modification attention à changer en fonction de la base de données
			
//verification de la selection du radioButton
$SelectionRadioButton=false;
//gestion du radio button

if($d['User']['TypePersonne']==2) {
		$d['User']['TypePersonne']=1;//guide
	$SelectionRadioButton=true;

	} 


if ($d['User']['TypePersonne']==3){
	$d['User']['TypePersonne']=0;//touriste
	$SelectionRadioButton=true;

	}

	
	
	//verification du bon format du mot de passe
	$formatMdp=false;
	if (!empty($d['User']['Mdp'])){
		if(strlen($d['User']['Mdp'])>=6){
			$formatMdp=True;
		}else{
			$formatMdp=false;
		}
	}
	
	
	
 // verification que les deux mots de passe sont les mêmes plus mot de passe en format securisé
	$comparaisonmdp=false;    	    		    
if (!empty($d['User']['Mdp'])){
		if ($d['User']['Mdp']==$d['User']['confmdp']){
			$d['User']['Mdp']=Security::hash($d['User']['Mdp'],null,true);//cryptage du mot de passe
			$comparaisonmdp=True;
		}else{
			$comparaisonmdp=false;
				}	
								 }	


if (($comparaisonmdp)and($SelectionRadioButton)and($formatMdp)){
   
		   if ($this->User->save($d,true,array('TypePersonne','NomUser','PrenomUser','MailUser','Identifiant','Mdp'))){//sauvegarder les données dans la base de données
//generation du lien d'activation
		   
	     	$link=array('controller'=>'users','action'=>'activate',($this->User->id).'-'.md5($d['User']['Mdp']));
		   	//permet de gerer l'envoie pour confirmer l'inscription
		
		
            App::uses('CakeEmail','Network/Email');
		   	$mail = new CakeEmail('smtp');
		   	$mail->from('touristeProjet@gmail.com')
		   	   ->to($d['User']['MailUser'])
		   	   ->subject('Test::Inscription')
		   	   ->emailFormat('html')
		   	   ->template('registration')
		   	   ->viewVars(array('NomUser'=>$d['User']['NomUser'],'PrenomUser'=>$d['User']['PrenomUser'],'link'=>$link))
		   	   ->send();
            $this->request->data= array();//permet de vider tous les champs on peut aussi faire une redirection
			$this->Session->setFlash("Votre compte a bien été créé, valider votre inscription grace au mail de confirmation","notif");
			$this->redirect('/');//redirection vers home
			}else{
				$this->Session->setFlash("Merci de corriger vos erreurs","message_error");		
				
				
			}
			
			
}else{
	$this->Session->setFlash("Merci de corriger vos erreurs","message_error");
	//Si les mots de passe ne sont pas les memes
	if ($comparaisonmdp==false){
		    $this->User->validationErrors['confmdp']= array('les mots de passe ne correspondent pas');
	} 
	//si le mot de passe est au bon format
	
	if($formatMdp==false){
		$this->User->validationErrors['Mdp']= array('le mot de passe doit faire six caractéres minimum');
	}
	
	
	//si le radio button n'est pas rempli
	if($SelectionRadioButton==false){
		$this->User->validationErrors['Vide']= array('Veuillez selectionner votre type de profil (guide/touriste)');
	}
	
}		
		
		}
		}

function login(){
	if($this->request->is('post')){//verifier que des données ont bien été envoyées
		if($this->Auth->login()){//connection
			$this->User->id=$this->Auth->user("id");//permet d'inserer la date de derniere connection
			$this->User->saveField('DerniereCoUser',date('Y-m-d H:i:s'));
			$this->Session->setFlash("Vous êtes maintenant connecté","notif");
			$this->redirect('/');//redirection vers home
		}else{
			$this->User->id=$this->Auth->user("id");//permet d'inserer la date de derniere connection
			$this->Session->setFlash("Identifiants incorrects","message_error");
		
		
		
			
			
		}
	}	
}


function membre_index(){//on limite l'acces grace aux prefixe là acces qu'au vues membres
	
}
		
function logout(){//permet de se déconnecter
	$this->Auth->logout();
	$this->Session->setFlash("vous �tes d�connect�","notif");// ne marche pas
	$this->redirect('/');//revoir pour faire la redirection
	
}
		
function activate($token){//variable correspondant à l'url permet d'activer le compte de l'utilisateur
	$token=explode('-',$token);//decoder l'url
	debug($token);
	$user=$this->User->find('first',array(
			'conditions'=>array('User.id'=>$token[0],'MD5(User.Mdp)'=>$token[1],//changement 10/12/2012
					'Active'=>0)//les utilisateurs non activés seulement
			));

if (!empty($user)){
	$this->User->id = $user['User']['id'];
	$this->User->saveField('DateInscriptionUser',date('Y-m-d H:i:s'));
	$this->User->saveField('Active',1);//changement du boolean dans la base de donnée
	$this->Auth->login($user['User']);//permet de logger automatiquement l'utilisateur
	$this->Session->setFlash("votre compte a bien été activé","notif");
	
	
}else{
	$this->Session->setFlash("Ce lien d'activation n'est pas valide","message_error");
	
}
$this->redirect('/');//redirige vers la page d'accueil
	die();
	
}

function password () {//fonction pour recupérer le mot de passe
	//pour generer grace a la fonction unique id
	if(!empty($this->request->params['named']['token'])){
		$token=$this->request->params['named']['token'];
		$token= explode('-',$token);
		$user=$this->User->find('first',array('conditions'=>array('id'=>$token[0],'Md5(User.Mdp)'=>$token[1]),'active'=>1));
		if($user){
			$this->User->id=$user['User']['id'];
			$password=substr(md5(uniqid(rand(),true)),0,8);//generation nouveau mot de passe
		$this->User->saveField('Mdp',Security::hash($password,null,true));

		$this->Session->setFlash("votre mot de passe a bien été réinitialisé,voici votre nouveau mot de passe :$password","notif");
		$this->redirect('/users/login');
		}else{
			$this->Session->setFlash("Le lien n'est pas valide","message_error");
			
		}
		
	}
	
	
	if($this->request->is('post')){
		$v= current ($this->request->data);
		$user=$this->User->find('first',array('conditions'=>array('MailUser'=>$v['MailUser'],'active'=>1)));
	
		if(empty($user)){
		$this->Session->setFlash("Aucun utilisateur ne correspond à ce mail","message_error");
			}else{
	//génération d'un nouveau mot de passe	
    App::uses('CakeEmail','Network/Email');
    $link=array('controller'=>'users','actions'=>'password','token'=>$user['User']['id'].'-'.md5($user['User']['Mdp']));
    $mail= new CakeEmail();
   	$mail = new CakeEmail('smtp');
		   	$mail->from('touristeProjet@gmail.com')
		   	   ->to($user['User']['MailUser'])
		   	   ->subject('Test::Mot de passe oublié')
		   	   ->emailFormat('html')
		   	   ->template('mdp')
		   	   ->viewVars(array('Identifiant'=>$user['User']['Identifiant'],'link'=>$link))
		   	   ->send();
		   	
		   	$this->Session->setFlash("Un email vous a été avec un nouveau mot de passe","notif");
		   	$this->redirect('/');//redirige vers la page d'accueil
		}
	
	}
}
		
function edit(){
	$user_id=$this->Auth->user('id');
	if(!$user_id){
		$this->redirect('/');
		die();
		
	}
	$this->User->id = $user_id;
	if($this->request->is('put')||$this->request->is('post')){
		$d=$this->request->data;
		$d['User']['id']=$user_id;
	
		
//verification du bon format du mot de passe
		$formatMdp2=false;
		if (!empty($d['User']['pass1'])){
			if(strlen($d['User']['pass1'])>=6){
				$formatMdp2=True;
			}else{
				$formatMdp2=false;
			}
		}
		
	
		
		$passError=false;
		
//verification mot de passe et confirmation mot de passe !!!!!
		if(!empty($d['User']['pass1'])){
			if ($d['User']['pass1']==$d['User']['pass2']){
				$d['User']['Mdp']=Security::hash($d['User']['pass1'],null,true);				
				$passError=true;
			}else{
				$passError=false;				
			}
			
		}
		
if (($passError)and($formatMdp2)){		
		//pour sauver les nouvelles informations
		if($this->User->save($d,true,array('DateNaissanceUser','TelephoneUser','Mdp'))) {
			$this->Session->setFlash("Votre profil a bien été modifié","notif");
			$this->request->data=$this->User->read();
		}else {
			$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
				
		}
}else {
$this->Session->setFlash("Impossible de sauvegarder modifier vos erreurs","message_error");

if($passError==false)
{$this->User->validationErrors['pass2']= array('les mots de passe ne correspondent pas');
}
if($formatMdp2==false)
{$this->User->validationErrors['pass1']= array('le mot de passe doit faire au moins 6 caract�res');
}
$this->request->data['User']['pass1']=$this->request->data['User']['pass2']='';//laisse les champs vides

}
	
$this->request->data['User']['pass1']=$this->request->data['User']['pass2']='';//laisse les champs vides
	
}
		
}	
		

			
		
	
}

?>