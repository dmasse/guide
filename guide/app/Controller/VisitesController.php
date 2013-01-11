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

}
?>