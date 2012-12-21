<?php 
$this->set('title_for_layout',"Créer une nouvelle visite");

 echo $this->Form->create('Visite');
 


 echo $this->Form->input('Trad_titre_desc_visite.titre_visite_trad',array('label'=>"Indiquez le titre que vous voulez donnez à votre visite"));
 echo $this->Form->input('Trad_titre_desc_visite.desc_visite_trad',array('label'=>"Indiquez une description pour votre visite"));
 echo $this->Form->input('Type_de_visite.type_visite_français_id',array('label'=>'Choississez votre type de visite :'));



 echo $this->Form->end("Valider ma visite");?>