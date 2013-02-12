<?php  
class PointsController extends AppController 
{ 
    //var $scaffold; 
    var $name = 'Points'; 
    var $helpers = array('Html', 'Form', 'Ajax', 'Javascript','GoogleMap' ); 

    function index() { 
        $this->layout = "map"; 
        $this->Point->recursive = 0; 
        $this->set('points', $this->Point->find('all')); 
    } 

    function add() { 
        if(empty($this->data)) { 
            $this->render(); 
        } else { 
            $this->cleanUpFields(); 

            $address = $this->data['Point']; 
            unset( 
                $address['name'],$address['description'], 
                $address['latitude'], $address['longitude'], 
                $address['zoom'] 
                ); 
            var_dump($address); 
            vendor('googlegeo'); 
            $googleGeo = new GoogleGeo($address); 
            $geo = $googleGeo->geo(); 
            var_dump($geo); 
            $this->data = array_merge($this->data['Point'],$geo); 

        if($this->Point->save($this->data)) { 
                $this->Session->setFlash('The Point has been saved'); 
                //$this->redirect('/points/index'); 
            } else { 
                $this->Session->setFlash('Please correct errors below.'); 
            } 
        } 
    } 
} 
?>