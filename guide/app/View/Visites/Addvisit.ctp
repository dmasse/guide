<?php 
$this->set('title_for_layout',"Créer une nouvelle visite");

 echo $this->Form->create('Visite');
 

 if ($SessionTypePers==1){
 echo $this->Form->button('Visite Physique',array('name'=>'type', 'value' => 'physique'));
 echo $this->Form->button('Visite Audio', array('name' => 'type', 'value' => 'audio'));;
 echo $this->Form->button('Visite Papier', array('name' => 'type', 'value' => 'papier'));;
 echo $this->Form->end();
 }

 ?>