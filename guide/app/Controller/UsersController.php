<?php 


class UsersController extends AppController{

	//var $name="User";
	var $uses = array("User");//precise le modél à utiliser
	var $components = array('Auth','RequestHandler');//permet de récupérer l'adresse IP
	//var $primaryKey = 'IdUser';//changement du nom de la clé primaire

	function Registration(){//renvoie à la vue registration
		//verifier si les données ont été postées
		if ($this->request->is('post')){
			$d= $this->request->data;//empeche le piratage stocker les données dans un tableau
			$d['User']['id'] = null;//permet d'etre sur d'avoir une insertion et non une modification attention à changer en fonction de la base de données
	
			//verification de la selection du radioButton TYPE DE PERSONNE (Guide/Touriste)
			$SelectionRadioButtonTypePersonne=false;
				
			//gestion du radio button
			if($d['User']['type_personne']==2) {
				$d['User']['type_personne']=1;//guide
				$SelectionRadioButtonTypePersonne=true;
			}
	
	
			if ($d['User']['type_personne']==3){
				$d['User']['type_personne']=0;//touriste
				$SelectionRadioButtonTypePersonne=true;
			}
	
			//verification de la selection du radioButton CIVILITE (Melle, Mme, Mr)
			$SelectionRadioButtonCivilite=false;
				
			//gestion du radio button
			if($d['User']['civilite']==2){
				$d['User']['civilite']="Melle";//Mademoiselle
				$SelectionRadioButtonCivilite=true;
			}
	
			if($d['User']['civilite']==3){
				$d['User']['civilite']='Mme';//Madame
				$SelectionRadioButtonCivilite=true;
			}
	
			if($d['User']['civilite']==4){
				$d['User']['civilite']='Mr';//Monsieur
				$SelectionRadioButtonCivilite=true;
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
	
			//verification de l'accord aux conditions générales d'utilisation
			$comparaisoncgu=false;
			if (!empty($d['User']['cgu'])){
				$comparaisoncgu=True;
			}else{
				$comparaisoncgu=false;
			}
	
			// verification que les deux mots de passe sont les mêmes plus mot de passe en format securisé
			$comparaisonmdp=false;
			if (!empty($d['User']['mdp'])){
				if ($d['User']['mdp']==$d['User']['confmdp']){
					$d['User']['mdp']=Security::hash($d['User']['mdp'],null,true);//cryptage du mot de passe
					$comparaisonmdp=True;
				}else{
					$comparaisonmdp=false;
				}
	
				//verification du bon format du mot de passe
				$formatMdp=false;
				if (!empty($d['User']['mdp'])){
					if(strlen($d['User']['mdp'])>=6){
						$formatMdp=True;
					}else{
						$formatMdp=false;
					}
				}
					
				//verification de la civilité
				$comparaisoncivilite=false;
				if (!empty($d['User']['civilite'])){
					$comparaisoncivilite=True;
				}else{
					$comparaisoncivilite=false;
				}
	
	
	
				if (($comparaisonmdp)and($SelectionRadioButtonTypePersonne)and($formatMdp)and($comparaisoncgu)and($comparaisoncivilite)and($SelectionRadioButtonCivilite)){
					if ($this->User->save($d,true,array('type_personne','nom_user','prenom_user','mail_user','identifiant','mdp', 'cgu','optin_b','optin_n','civilite'))){//sauvegarder les données dans la base de données
						//generation du lien d'activation
							
						$link=array('controller'=>'users','action'=>'activate',($this->User->id).'-'.md5($d['User']['mdp']));
						//permet de gerer l'envoie pour confirmer l'inscription
	
	
						App::uses('CakeEmail','Network/Email');
						$mail = new CakeEmail('smtp');
						$mail->from('touristeProjet@gmail.com')
						->to($d['User']['mail_user'])
						->subject('Test::Inscription')
						->emailFormat('html')
						->template('registration')
						->viewVars(array('nom_user'=>$d['User']['nom_user'],'prenom_user'=>$d['User']['prenom_user'],'link'=>$link))
						->send();
						$this->request->data= array();//permet de vider tous les champs on peut aussi faire une redirection
						$this->Session->setFlash("Votre compte a bien été créé, valider votre inscription grace au mail de confirmation","notif");
						$this->redirect('/');//redirection vers home
							
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
				'conditions'=>array('User.id'=>$token[0],'MD5(User.Mdp)'=>$token[1],
						'Active'=>0)//les utilisateurs non activés seulement
		));

		if (!empty($user)){
			$this->User->id = $user['User']['id'];
			$Ip = $this->RequestHandler->getClientIp();
			$this->User->saveField('adresse_ip',$Ip);
			$this->User->saveField('active',1);//changement du boolean dans la base de donnée
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

/*	function edit(){
		
		$user_id=$this->Auth->user('id');
		$this->User->id = $user_id;//on fixe l'id du modéle
		
		$Sessionguide=$this->Auth->user('type_personne');
		$Editguide=$this->Auth->user('guide_id');
		$d['User']['id']=$user_id;
		$d['Guide']['id']=$this->User->field('guide_id');
		$d['Guide']['photo_guide']='0';
		$d['Societe']['siret']='0';
		$d['Rib_guide']['num_compte']='0';
		$d['Societe']['id']=$this->User->Guide->field('societe_id');
		$d['Rib_guide']['id']=$this->User->Guide->field('rib_guide_id');
		$d['Diplome']['id']=$this->User->Guide->Diplome->field('id');
		//$this->set('photoguide', $this->User->field('guide_id'));
	
		if(!$user_id){
			$this->redirect('/');
			die();
		}
		


		
//gestion des boutons
		if($this->request->data['type'] == 'profil'){
			if ($Sessionguide==1){
			$this->User->saveAssociated($d,true,array('Guide'=>array('id','photo_guide')));
			}
			$this->redirect( array('controller' => 'Users','action' => 'edit_profil'));
			//pour remettre le champs à null regarder si on ne peut pas trouver une autre solution
			$d['Guide']['photo_guide']=null;
			$this->User->saveAssociated($d,true,array('Guide'=>array('id','photo_guide')));
		}
		
			
		
		 if($this->request->data['type'] == 'banque')
			{
				$this->User->Guide->saveAssociated($d,true,array('Rib_guide'=>array('id','num_compte')));
				$this->redirect( array('controller' => 'Users','action' => 'edit_banque'));
				$d['Rib_guide']['num_compte']=null;
				$this->User->Guide->saveAssociated($d,true,array('Rib_guide'=>array('id','num_compte')));
			}
		
			if($this->request->data['type'] == 'cursus')
			{
				$this->User->Guide->saveAssociated($d,true,array('Societe'=>array('id','siret')));//sauvegarde aussi diplome
				$this->User->Guide->saveAssociated($d,true);//sauvegarde aussi diplome
	
				$this->redirect( array('controller' => 'Users','action' => 'edit_cursus'));
				$d['Societe']['siret']=null;
				$this->User->Guide->saveAssociated($d,true,array('Societe'=>array('id','siret')));
				//$this->User->Guide->saveAssociated($d,true,array('Diplome'=>array('id','photo_diplome')));
			}
			
		



          
			
				if(($this->User->saveAssociated($d,true,array('User'=>array('identifiant','nom_user','prenom_user','mail_user','date_naissance_user','telephone_user','mdp','langue_id'),'Guide'=>array('id','sexe_guide','photo_guide'))))and ($this->User->Guide->saveAssociated($d,true,array('Societe'=>array('id','Societe.nom_societe','Societe.telephone_societe','mail_societe','siret'),'Rib_guide'=>array('id','Rib_guide.banque','Rib_guide.Societe.guichet','Rib_guide.Societe.num_compte','Rib_guide.nom_titulaire','Rib_guide.domiciliation','Rib_guide.num_iban','Rib_guide.bic'))))){
				$this->Session->setFlash("Votre profil a bien été modifié","notif"); 
				$this->set('photoguide', $this->User->field('guide_id'));
				}else {
					$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));

				}
			}else{
			
				//pour sauver les nouvelles informations
				if($this->User->save($d,true,array('User.identifiant','User.nom_user','User.prenom_user','User.mail_user','User.date_naissance_user','User.telephone_user','User.mdp','User.langue_id'))) {
					$this->Session->setFlash("Votre profil a bien été modifié","notif");
				}else {
					$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));


		



	}*/

 function edit_profil(){
 debug($this->webroot);	
 $Sessionguide=$this->Auth->user('type_personne');
 $Editguide=$this->Auth->user('guide_id');
 $this->User->id = $this->Auth->user('id');//on fixe l'id du modéle
 debug($this->User->id );
 $d['Guide']['id']=$this->User->field('guide_id');
 debug($d);
 //préremplir les champs
 $this->request->data['User']['identifiant'] = $this->Auth->user('identifiant');
 $this->request->data['User']['nom_user'] = $this->Auth->user('nom_user');
 $this->request->data['User']['prenom_user'] = $this->Auth->user('prenom_user');
 $this->request->data['User']['mail_user'] = $this->Auth->user('mail_user');
 $this->request->data['User']['date_naissance_user'] = $this->Auth->user('date_naissance_user');
 $this->request->data['User']['telephone_user'] = $this->Auth->user('telephone_user');
 
 
 //permet d'afficher la liste des langues existantes
 $this->set('langues',$this->User->Langue->find('list',array('field'=>'Langues.nom_langue')));
 
 if($this->request->is('put')||$this->request->is('post')){
 	$d=array();
 	$d=$this->request->data;
 	$d['Guide']['id']=$this->User->field('guide_id');
 	$d['User']['id']= $this->User->id;
 	$tmp_name=$this->request->data['Guide']['photo_guide']['tmp_name'];
 	debug($d);
 	$name=$this->request->data['Guide']['photo_guide']['name'];
 
 	$uploads_dir='C:/wamp/www/guide/guide/'.'app/webroot/img';//on précise on l'on veut mettre la photo
 	move_uploaded_file($tmp_name, "$uploads_dir/$name");
 $d['Guide']['photo_guide']=$uploads_dir.'/'.$name;
 
 	//verification mot de passe et confirmation mot de passe !!!!!
    $passError=false;
 	if(!empty($d['User']['pass1'])){
 		if ($d['User']['pass1']==$d['User']['pass2']){
 			$d['User']['mdp']=Security::hash($d['User']['pass1'],null,true);
 
 		}else{
 			$passError=true;}}
 	
 	if($passError){
 		$this->User->validationErrors['pass2']= array('les mots de passe ne correspondent pas');
 	}else{
 		$this->request->data=$this->User->read();
 	}
 debug($this->request->data);	
 if(($this->User->saveAssociated($d,true,array('User'=>array('id','identifiant','nom_user','prenom_user','mail_user','date_naissance_user','telephone_user','mdp','langue_id'),'Guide'=>array('id','photo_guide'))))){
$this->Session->setFlash("Votre profil a bien été modifié","notif"); 
}else {
$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
}
 $this->request->data['User']['pass1']=$this->request->data['User']['pass2']='';//laisse les champs vides
  }
 
 
}

function edit_banque(){
$Editguide=$this->Auth->user('guide_id');	
//si le guide a au moins une fois changer son profil

if (!empty($Editguide)){
	//on préremplit les champs
$this->request->data['Rib_guide']['banque'] =  $this->User->Guide->Rib_guide->field('banque');
$this->request->data['Rib_guide']['guichet'] =  $this->User->Guide->Rib_guide->field('guichet');
$this->request->data['Rib_guide']['num_compte'] =  $this->User->Guide->Rib_guide->field('num_compte');
$this->request->data['Rib_guide']['nom_titulaire'] =  $this->User->Guide->Rib_guide->field('nom_titulaire');
$this->request->data['Rib_guide']['domiciliation'] =  $this->User->Guide->Rib_guide->field('domiciliation');
$this->request->data['Rib_guide']['num_iban'] =  $this->User->Guide->Rib_guide->field('num_iban');
$this->request->data['Rib_guide']['bic'] =  $this->User->Guide->Rib_guide->field('bic');
		}	
		
		if($this->request->is('put')||$this->request->is('post')){
			$d=$this->request->data;
if(($this->User->Guide->saveAssociated($d,true,array('Rib_guide'=>array('id','Rib_guide.banque','Rib_guide.guichet','Rib_guide.num_compte','Rib_guide.nom_titulaire','Rib_guide.domiciliation','Rib_guide.num_iban','Rib_guide.bic'))))){
				$this->Session->setFlash("Votre profil a bien été modifié","notif");
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
			
		}
				
		
		
}
function edit_cursus(){
$Editguide=$this->Auth->user('guide_id');

$this->set('diplome', $this->User->Guide->Diplome->field('id'));
//si le guide a au moins une fois changer son profil
if (!empty($Editguide)){

	$this->request->data['Societe']['nom_societe'] =$this->User->Guide->Societe->field('nom_societe');
	$this->request->data['Societe']['telephone_societe'] = $this->User->Guide->Societe->field('telephone_societe');
	$this->request->data['Societe']['mail_societe'] =  $this->User->Guide->Societe->field('mail_societe');
	$this->request->data['Societe']['siret'] =  $this->User->Guide->Societe->field('siret');	
	
	
}

if($this->request->is('put')||$this->request->is('post')){
	$d=$this->request->data;
	if(($this->User->Guide->saveAssociated($d,true,array('Societe'=>array('id','Societe.nom_societe','Societe.telephone_societe','mail_societe','siret'))))){
		$this->Session->setFlash("Votre profil a bien été modifié","notif");
	}else {
		$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
	}
		
}


}

function viewmember(){
	
	//permet de gérer les boutons

	$user_id=$this->Auth->user('id');
	$this->User->id = $user_id;//on fixe l'id du modéle
	
	$Sessionguide=$this->Auth->user('type_personne');
	$Editguide=$this->Auth->user('guide_id');
	$d['User']['id']=$user_id;
	$d['Guide']['id']=$this->User->field('guide_id');
	$d['Guide']['photo_guide']='0';
	$d['Societe']['siret']='0';
	$d['Rib_guide']['num_compte']='0';
	$d['Societe']['id']=$this->User->Guide->field('societe_id');
	$d['Rib_guide']['id']=$this->User->Guide->field('rib_guide_id');
	$d['Diplome']['id']=$this->User->Guide->Diplome->field('id');

	
	if(!$user_id){
		$this->redirect('/');
		die();
	}
		
	//gestion des boutons
	if($this->request->data['type'] == 'profil'){
		if ($Sessionguide==1){
			$this->User->saveAssociated($d,true,array('Guide'=>array('id','photo_guide')));
		}
		$this->redirect( array('controller' => 'Users','action' => 'edit_profil'));
		//pour remettre le champs à null regarder si on ne peut pas trouver une autre solution
		$d['Guide']['photo_guide']=null;
		$this->User->saveAssociated($d,true,array('Guide'=>array('id','photo_guide')));
	}
	
		
	
	if($this->request->data['type'] == 'banque')
	{
		$this->User->Guide->saveAssociated($d,true,array('Rib_guide'=>array('id','num_compte')));
		$this->redirect( array('controller' => 'Users','action' => 'edit_banque'));
		$d['Rib_guide']['num_compte']=null;
		$this->User->Guide->saveAssociated($d,true,array('Rib_guide'=>array('id','num_compte')));
	}
	
	if($this->request->data['type'] == 'cursus')
	{
		$this->User->Guide->saveAssociated($d,true,array('Societe'=>array('id','siret')));//sauvegarde aussi diplome
		$this->User->Guide->saveAssociated($d,true);//sauvegarde aussi diplome
	
		$this->redirect( array('controller' => 'Users','action' => 'edit_cursus'));
		$d['Societe']['siret']=null;
		$this->User->Guide->saveAssociated($d,true,array('Societe'=>array('id','siret')));
		//$this->User->Guide->saveAssociated($d,true,array('Diplome'=>array('id','photo_diplome')));
	}
		
	
	//permet de gérer l'affichage
	//Récupère l'id de l'user
	$user_id=$this->Auth->user('id');
	//Si l'user n'est pas connecté redirection
	if(!$user_id){
		$this->redirect('/users/login/');
		die();

	}
	$this->User->id = $user_id;

	if ($this->Auth->user('type_personne')==1)
	{     $this->set('photoGuide',$this->User->Guide->field('photo_guide'));
		$data = array(
				'identifiant'         => $this->Auth->user('identifiant'),
				'nom_user'            => $this->Auth->user('nom_user'),
				'prenom_user'         => $this->Auth->user('prenom_user'),
				'mail_user'           => $this->Auth->user('mail_user'),
				'date_naissance_user' => $this->Auth->user('date_naissance_user'),
				'telephone_user'      => $this->Auth->user('telephone_user'),
				'langue_nom'          => $this->Auth->user('langue_id'),
				'type_personne'       => $this->Auth->user('type_personne'),
				'civilite'            => $this->Auth->user('civilite'),
				'photo_guide'         => $this->Auth->user('photo_guide'),
				'nom_societe'         => $this->Auth->user('nom_societe'),
				'telephone_societe'   => $this->Auth->user('telephone_societe'),
				'mail_societe'        => $this->Auth->user('mail_societe'),
				'siret'               => $this->Auth->user('siret'),
				'banque'              => $this->Auth->user('banque'),
				'guichet'             => $this->Auth->user('guichet'),
				'num_comptes'         => $this->Auth->user('num_comptes'),
				'nom_titulaires'      => $this->Auth->user('nom_titulaires'),
				'domiciliation'       => $this->Auth->user('domiciliation'),
				'num_iban'            => $this->Auth->user('num_iban'),
				'bic'                 => $this->Auth->user('bic')
		);
	}
	else
	{
		$data = array(
				'identifiant'         => $this->Auth->user('identifiant'),
				'nom_user'            => $this->Auth->user('nom_user'),
				'prenom_user'         => $this->Auth->user('prenom_user'),
				'mail_user'           => $this->Auth->user('mail_user'),
				'date_naissance_user' => $this->Auth->user('date_naissance_user'),
				'telephone_user'      => $this->Auth->user('telephone_user'),
				'langue_id'           => $this->Auth->user('langue_id'),
				'type_personne'       => $this->Auth->user('type_personne'),
				'civilite'            => $this->Auth->user('civilite')
		);
	}

	$this->set($data);
}


}

?>
