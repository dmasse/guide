<?php 
$this->set('title_for_layout',"Créer une nouvelle visite");

 echo $this->Form->create('Visite');
 

 if ($SessionTypePers==1){
 echo $this->Form->button('Ajouter une visite Physique',array('name'=>'type', 'value' => 'physique'));
 echo $this->Form->button('Ajouter une visite Audio', array('name' => 'type', 'value' => 'audio'));;
 echo $this->Form->button('Ajouter une visite Papier', array('name' => 'type', 'value' => 'papier'));;
 echo $this->Form->end();
 }

 ?>