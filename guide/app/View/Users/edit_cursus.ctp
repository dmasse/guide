<?php $this->set('title_for_layout',"Editer mon profil");

 echo $this->Form->create('User',array('type'=>'file'));


 echo $this->Form->input('Societe',array('type'=>'label','label'=>"Si vous faites parti d'une société remplissez les champs suivants"));
 echo $this->Form->input('Societe.nom_societe',array('label'=>"Nom de la société"));
 echo $this->Form->input('Societe.telephone_societe',array('label'=>"Telephone de la société"));
 echo $this->Form->input('Societe.mail_societe',array('label'=>"Adresse mail de la société"));
 echo $this->Form->input('Societe.siret',array('label'=>"Numero de Siret de la société"));