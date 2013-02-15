<?php 


class VisitesController extends AppController{

	
	var $components = array('Auth');
	//var $primaryKey = 'IdUser';//changement du nom de la clé primaire

	function Addvisit(){//renvoie à la vue registration
		if ($this->request->is('post')){
			$d= $this->request->data;//empeche le piratage stocker les données dans un tableau
			$d['User']['id'] = null;//permet d'etre sur d'avoir une insertion et non une modification attention à changer en fonction de la base de données
	
		//Gestion des boutons
			if($this->request->data['type'] == 'physique'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));	
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_physique'));
			}
			
				
			if($this->request->data['type'] == 'papier'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_papier'));
			}
				
			if($this->request->data['type'] == 'audio'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_audio'));
			}
	}
	}
	
	function ajout_visite_physique(){	
    $Sessionguide=$this->Auth->user('type_personne');
    debug($this->Session->read('idvisite'));
   
    //permet d'afficher la liste des langues existantes
   $this->set('langues',$this->Visite->Visite_physique->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
   //permet d'afficher la liste des types de visites existants
  $this->set('typesVisites',$this->Visite->Type_de_visite->Type_visite_francai->find('list',array('field'=>'Type_visite_francais.type_visite_francai')));
  
 
  	//Gestion des boutons
  $d= $this->request->data;
  	if($this->request->data['type'] == 'localisation'){
  		$this->redirect( array('controller' => 'Points','action' => 'lieu_visite'));
  	}
  		
 
  
   if($this->request->is('put')||$this->request->is('post')){
	$d=array();
	$d=$this->request->data;
	
	//$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');

	//créer une nouvelle visite à chaque fois!!!!!
	$d['Visite']['id']= $this->Session->read('idvisite');
	debug($d['Visite']['id']);
	if($this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite_physique'=>array('id','Visite_physique.nb_personne','Visite_physique.duree_physique','Visite_physique.prix_physique','Visite_physique.acces_handicap')))){
	$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');
	
		//$this->redirect(array('controller' => 'actualites', 'action' =>'autoadd',$idvisite));
	//($this->Visite->Visite_physique->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'),'Langue'=>array('id','nom_langue'),'Date_visite_physique'=>array('id','date_visite_physique'))));
	$this->Session->setFlash("Une nouvelle visite physique a été créée","notif");
	//$this->redirect('/visites/addvisit');
	}else {
	$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
	}
	
		}
		
		
		}		
		
		
	function ajout_visite_papier(){

		$Sessionguide=$this->Auth->user('type_personne');
		
		//permet d'afficher la liste des langues existantes
		$this->set('langues',$this->Visite->Visite_physique->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
		//permet d'afficher la liste des types de visites existants
		$this->set('typesVisites',$this->Visite->Type_de_visite->Type_visite_francai->find('list',array('field'=>'Type_visite_francais.type_visite_francai')));
		
		//Gestion des boutons
		if($this->request->data['type'] == 'localisation'){
			$this->redirect( array('controller' => 'Points','action' => 'lieu_visite'));
		}
		
			
		
		if($this->request->is('put')||$this->request->is('post')){
			$d=array();
			$d=$this->request->data;
			$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
			$d['Visite']['guide_id']= $this->Auth->User('guide_id');
			//$d['Visite_papier']['id']= $this->Visite->Visite_papier->field('id');
		
//créer une nouvelle visite à chaque fois!!!!!
$d['Visite']['id']= $this->Session->read('idvisite');
if($this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite_papier'=>array('Visite_papier.id','Visite_papier.duree_papier','Visite_papier.prix_papier')))){
$d['Visite_papier']['id']= $this->Visite->Visite_papier->field('id');
		
				($this->Visite->Visite_papier->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'),'Langue'=>array('id','nom_langue'))));
				$this->Session->setFlash("Une nouvelle visite papier a été créée","notif");
				$this->redirect('/visites/addvisit');
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
		
		}
		
		
		}
				
	
	function ajout_visite_audio(){
		$Sessionguide=$this->Auth->user('type_personne');
		
		//permet d'afficher la liste des langues existantes
		$this->set('langues',$this->Visite->Visite_physique->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
		//permet d'afficher la liste des types de visites existants
		$this->set('typesVisites',$this->Visite->Type_de_visite->Type_visite_francai->find('list',array('field'=>'Type_visite_francais.type_visite_francai')));
		
		//Gestion des boutons
		if($this->request->data['type'] == 'localisation'){
			$this->redirect( array('controller' => 'Points','action' => 'lieu_visite'));
		}
		
			
		
		
		if($this->request->is('put')||$this->request->is('post')){
			$d=array();
			$d=$this->request->data;
			$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
		
			$d['Visite']['guide_id']= $this->Auth->User('guide_id');
			//$d['Visite_audio']['id']= $this->Visite->Visite_audio->field('id');
		
			//créer une nouvelle visite à chaque fois!!!!!
			$d['Visite']['id']= $this->Session->read('idvisite');
			if($this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite_audio'=>array('id','Visite_audio.duree_audio','Visite_audio.prix_audio')))){
				$d['Visite_audio']['id']= $this->Visite->Visite_audio->field('id');
		
				($this->Visite->Visite_audio->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'),'Langue'=>array('id','nom_langue'))));
				$this->Session->setFlash("Une nouvelle visite audio a été créée","notif");
				$this->redirect('/visites/addvisit');
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
		
		}
		
		
	
				
		}
	}	



?>
