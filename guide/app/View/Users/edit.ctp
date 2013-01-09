<?php $this->set('title_for_layout',"Editer mon profil");

 echo $this->Form->create('User',array('type'=>'file'));



 echo $this->Form->button('Modifier les informations de mon profil', array('name' => 'type', 'value' => 'profil'));
 if ($SessionTypePers==1){
 echo $this->Form->button('Modifier mes informations bancaires', array('name' => 'type', 'value' => 'banque'));
 echo $this->Form->button('Modifier mon cursus professionnel', array('name' => 'type', 'value' => 'cursus'));
 echo $this->Form->end();
 }
 
 echo $this->Form->end('Modifier');
 ?>