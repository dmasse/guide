<?php
class PointsController extends AppController {

	public function lieu_visite() {
		
		$d['lieu']=	$this->paginate('Point');
	$this->set($d);
		if($this->request->is('put')||$this->request->is('post')){
			$d=array();
			$d=$this->request->data;		
		debug($d);
		($this->Point->save($d,true,array('id','lat','lng','name')));
      
		}
	}
	
	public function edit($id){
		
		
		
	}
	public function delete($id){
	$this->Session->setFlash('la location a été supprimée');	
	$this->Point->delete($id);	
	$this->redirect($this->referer());	
		
		
	}
}
?>