<?php
class PointsController extends AppController {

	
	
	
	function recherche(){
	$d['points']=$this->Point->find('all');
	debug($d);	
	$this->set($d);	
	debug($this->Point->find('all'));
	debug($d['points']['0']['Point']['name']);
	$this->set('point2',$this->Point->find('all'));
	
		
	}
	public function lieu_visite() {

	//	$this->guide->id = $this->Auth->user('guide_id');
		$d['lieu']=	$this->paginate('Point');
	$this->set($d);
	debug($this->request->data);
		if($this->request->is('put')||$this->request->is('post')){
			$d=array();
			$d=$this->request->data;		
		debug($d);
	($this->Guide->Visite->Porter_sur->saveAssociated($d,true,array(point=>array('id','lat','lng','name'))));
	//($this->Point->save($d,true,array('id','lat','lng','name')));
    //   ($this->Guide->Visite->saveAssociated($d,true,array(porter_sur => array())));
		}
	}
	
	public function edit($id){
	$this->Point->id=$id;
	
	if($this->request->is('put')||$this->request->is('post')){	
	$d=$this->request->data;		
		debug($d);
	($this->Point->save($d,true,array('id','lat','lng','name')));
      	
	$this->redirect('/Points/lieu_visite');
	}
	$this->request->data=$this->Point->read();
	
	}
	public function delete($id){
	$this->Session->setFlash('la location a été supprimée');	
	$this->Point->delete($id);	
	$this->redirect($this->referer());	
		
		
	}
}
?>