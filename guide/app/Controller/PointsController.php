<?php
class PointsController extends AppController {

	
	
	
	function recherche(){
	$d['points']=$this->Point->find('all',array('recursive'=>3));
	
	
	debug($d);	
	$this->set($d);	
	//$this->set('point2',$this->Point->find('all'));
	
		
	}
	public function lieu_visite() {

	//	$this->guide->id = $this->Auth->user('guide_id');
	
		if($this->request->is('post')){
			$d=array();
			$d=$this->request->data;		

	//($this->Guide->Visite->Porter_sur->saveAssociated($d,true,array(Point=>array('id','lat','lng','name'))));
	//sauvegarde de la localisation
	($this->Point->save($d,true,array('id','lat','lng','name')));
	
	//sauvegarde de porter sur
	$d['Porter_sur']['visite_id']=$this->Session->read('idvisite');
	$d['Porter_sur']['point_id']=$this->Point->field('id');
	($this->Point->Porter_sur->save($d,true,array('id','visite_id','point_id')));}
	debug($d);
	debug($this->Session->read('typevisite'));
	if(($this->request->data['bouton']=='retour')and($this->Session->read('typevisite') == 'physique'))
   {
	$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_physique'));
	}
	if(($this->Session->read('typevisite') == 'audio')and ($this->request->data['bouton']=='retour')){
	
		$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_audio'));
	}
	if(($this->request->data['bouton'] == 'physique')and ($this->Session->read('typevisite')=='papier')){
	
		$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_papier'));
	}
	
   
		
	}
	
	
}
?>