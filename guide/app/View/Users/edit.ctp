<?php $this->set('title_for_layout',"Editer mon profil");

 echo $this->Form->create('User',array('type'=>'file'));
 echo $this->Form->input('Identifiant',array('label'=>"Votre Identifiant"));
 echo $this->Form->input('Nom_User',array('label'=>"Nom"));
 echo $this->Form->input('Prenom_User',array('label'=>"Prenom"));
 echo $this->Form->input('Mail_User',array('label'=>"Votre email"));
 echo $this->Form->input('Telephone_User',array('label'=>"Telephone"));
 echo $this->Form->input('Date_Naissance_User',array('label'=>"Date de naissance"));
 echo $this->Form->input('pass1',array('type'=>'password','label'=>"Votre nouveau mot de passe"));
 echo $this->Form->input('pass2',array('type'=>'password','label'=>"Confirmer le mot de passe"));

 if ($SessionTypePers==1){

 echo $this->Form->input('Guide.Sexe_Guide', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Indiquez votre sexe :',//permet de choisir la legende
          'options' => array(2 => 'Femme', 3 => 'Homme')));
          
 echo $this->Form->error('Guide.Sexe_Guide');
 echo $this->Form->input('Vide',array('type'=>'label','label'=>""));
 
 echo $this->Form->file('Guide.photo_guide');
 echo $this->Form->input('Societes.nom_societe',array('label'=>"Nom de la soci�t�"));
 echo $this->Form->input('Societes.telephone_societe',array('label'=>"Telephone de la soci�t�"));
 echo $this->Form->input('Societes.mail_societe',array('label'=>"telephone de la soci�t�"));
 echo $this->Form->input('Societes.siret',array('label'=>"Numero de Siret de la soci�t�"));
 
  
 }
 
 echo $this->Form->end('Modifier');?>