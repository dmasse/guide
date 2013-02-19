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
				$this->Session->write('typevisite','physique');
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_physique'));
			}
			
				
			if($this->request->data['type'] == 'papier'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				$this->Session->write('typevisite','papier');
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_papier'));
			}
				
			if($this->request->data['type'] == 'audio'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				$this->Session->write('typevisite','audio');
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_audio'));
			}
	}
	}
	
	function ajout_visite_physique(){	
    $Sessionguide=$this->Auth->user('type_personne');
    debug($this->Session->read('idvisite'));
    $this->paginate = array(
    		'conditions' => array('Porter_sur.visite_id LIKE'=>$this->Session->read('idvisite')));
    
    $d['lieu']=	$this->paginate('Porter_sur');
    debug($d['lieu']);
    $this->set($d);
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
	$d['Visite_physique']['visite_id']= $this->Session->read('idvisite');
	debug($d['Visite']['id']);
	
	if($this->Visite->saveAssociated($d,true,array('Visite_physique'=>array('Visite_physique.nb_personne','Visite.physique.duree_physique','Visite_physique.prix_physique','Visite.physique.acces_handicap','Visite.physique.visite_id'),'Type_de_visite'=>array('type_visite_francais_id'),'Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id','visite_id','visite_physique_id')))){
	$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');
	$d['Visite_physique']['visite_id']=$d['Visite']['id'];
	debug($d);
	($this->Visite->Visite_physique->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id','visite_id','visite_physique_id'),'Langue'=>array('id','nom_langue'),'Date_visite_physique'=>array('id','date_visite_physique'))));
	$this->Session->setFlash("Une nouvelle visite physique a été créée","notif");
	//$this->redirect('/visites/addvisit');
	}else {
	$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
	}
	
		}
		
		
		}		
		
		
	function ajout_visite_papier(){

		$Sessionguide=$this->Auth->user('type_personne');
		$this->paginate = array(
				'conditions' => array('Porter_sur.visite_id LIKE'=>$this->Session->read('idvisite')));
		
		$d['lieu']=	$this->paginate('Porter_sur');
		debug($d['lieu']);
		$this->set($d);
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
			$d['Trad_titre_desc_visite']['visite_id']=$d['Visite']['id'];
			if($this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite_papier'=>array('Visite_papier.id','Visite_papier.duree_papier','Visite_papier.prix_papier')))){
			$d['Visite_papier']['id']= $this->Visite->Visite_papier->field('id');
				($this->Visite->Visite_papier->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id','visite_id'),'Langue'=>array('id','nom_langue'))));
				$this->Session->setFlash("Une nouvelle visite papier a été créée","notif");
				$this->redirect('/visites/addvisit');
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
		
		}
		
		
		}
				
	
	function ajout_visite_audio(){
		$Sessionguide=$this->Auth->user('type_personne');
		$this->paginate = array(
				'conditions' => array('Porter_sur.visite_id LIKE'=>$this->Session->read('idvisite')));
		
		$d['lieu']=	$this->paginate('Porter_sur');
		debug($d['lieu']);
		$this->set($d);
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
			$d['Trad_titre_desc_visite']['visite_id']=$d['Visite']['id'];
			if($this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite_audio'=>array('id','Visite_audio.duree_audio','Visite_audio.prix_audio')))){
				$d['Visite_audio']['id']= $this->Visite->Visite_audio->field('id');
		
				($this->Visite->Visite_audio->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id','visite_id'),'Langue'=>array('id','nom_langue'))));
				$this->Session->setFlash("Une nouvelle visite audio a été créée","notif");
				$this->redirect('/visites/addvisit');
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
		
		}
		
		
	
				
		}
	
	 function edit($id){
			$this->Visite->Porter_sur->Point->id=$id;
		
			if($this->request->is('put')||$this->request->is('post')){
				$d=$this->request->data;
				debug($d);
				($this->Visite->Porter_sur->Point->save($d,true,array('id','lat','lng','name')));
				 
				//$this->redirect('/Points/lieu_visite');
			}
			$this->request->data=$this->Point->read();
		
		}
	 function delete($id){
			$this->Session->setFlash('la localisation a été supprimée');
			$this->Visite->Porter_sur->Point->delete($id);
			$this->redirect($this->referer());
		
		
		}



}	



?>
