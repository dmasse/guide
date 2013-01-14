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
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_physique'));
			}
			
				
			if($this->request->data['type'] == 'papier'){
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_papier'));
			}
				
			if($this->request->data['type'] == 'audio'){
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_audio'));
			}
	}
	}
	
	function ajout_visite_physique(){	
    $Sessionguide=$this->Auth->user('type_personne');
    
    //permet d'afficher la liste des langues existantes
   $this->set('langues',$this->Visite->Visite_physique->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
   if($this->request->is('put')||$this->request->is('post')){
	$d=array();
	$d=$this->request->data;
	$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
	debug($d);
	$d['Visite']['guide_id']= $this->Auth->User('guide_id');
	
	
	//créer une nouvelle visite à chaque fois!!!!!
	if(($this->Visite->saveAssociated($d,true,array('Visite_physique'=>array('id','Visite_physique.nb_personne','Visite_physique.duree_physique','Visite_physique.prix_physique','Visite_physique.acces_handicap'))))){
	$this->Visite->id = $this->Visite->field('id');;//on fixe l'id du modéle
	($this->Visite->Visite_physique->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'),'Langue'=>array('id','nom_langue'))));
	$this->Session->setFlash("Une nouvelle visite physique a été créée","notif");
	$this->redirect('/visites/addvisit');
	}else {
	$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
	}
	
		}
		
		
		}		
		
		
		
		
	}
		
	function ajout_visite_papier(){

}
	
	function ajout_visite_audio(){
		
		//on préremplit les champs
		$this->request->data['Visite_audio']['duree_audio'] =  $this->Visite->Visite_audio->field('duree_audio');
		$this->request->data['Visite_audio']['prix_audio'] =  $this->Visite->Visite_audio->field('prix_audio');
		
		if($this->request->is('put')||$this->request->is('post')){
			$d=$this->request->data;
			if(($this->User->Guide->saveAssociated($d,true,array('Visite_audio'=>array('id','Visite_audio.duree_audio','Visite_audio.prix_audio'))))){
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
				
		}
	
}


?>