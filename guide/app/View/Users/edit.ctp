<?php $this->set('title_for_layout',"Editer mon profil");

 echo $this->Form->create('User',array('type'=>'file'));
 echo $this->Form->input('User.identifiant',array('label'=>"Votre Identifiant"));
 echo $this->Form->input('User.nom_user',array('label'=>"Nom"));
 echo $this->Form->input('User.prenom_user',array('label'=>"Prenom"));
 echo $this->Form->input('User.mail_user',array('label'=>"Votre email"));
 echo $this->Form->input('User.telephone_user',array('label'=>"Telephone"));
 echo $this->Form->input('User.date_naissance_user',array('label'=>"Date de naissance"));
 echo $this->Form->input('User.langue_id',array('label'=>'Choississez votre langue préférée :'));
 echo $this->Form->input('pass1',array('type'=>'password','label'=>"Votre nouveau mot de passe"));
 echo $this->Form->input('pass2',array('type'=>'password','label'=>"Confirmer le mot de passe"));

 if ($SessionTypePers==1){

 echo $this->Form->input('Guide.sexe_guide', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Indiquez votre sexe :',//permet de choisir la legende
          'options' => array(0 => 'Femme', 1 => 'Homme')));
          
 echo $this->Form->error('Guide.sexe_guide');
 echo $this->Form->input('Vide',array('type'=>'label','label'=>""));
 
 //echo $this->Form->file('Guide.photo_guide');
 echo $this->Form->input('Societe',array('type'=>'label','label'=>"Si vous faites parti d'une société remplisser les champs suivants"));
 echo $this->Form->input('Societe.nom_societe',array('label'=>"Nom de la société"));
 echo $this->Form->input('Societe.telephone_societe',array('label'=>"Telephone de la société"));
 echo $this->Form->input('Societe.mail_societe',array('label'=>"Adresse mail de la société"));
 echo $this->Form->input('Societe.siret',array('label'=>"Numero de Siret de la société"));
 echo $this->Form->input('Rib',array('type'=>'label','label'=>"Remplissez vous informations bancaires"));
 echo $this->Form->input('Rib_guide.banque',array('label'=>"Banque"));
 echo $this->Form->input('Rib_guide.guichet',array('label'=>"Guichet"));
 echo $this->Form->input('Rib_guide.num_compte',array('label'=>"Numéro de compte"));
 echo $this->Form->input('Rib_guide.nom_titulaire',array('label'=>"Nom du titulaire"));
 echo $this->Form->input('Rib_guide.domiciliation',array('label'=>"Adresse de la banque")); 
 echo $this->Form->input('Rib_guide.num_iban',array('label'=>"Numero Iban"));
 echo $this->Form->input('Rib_guide.bic',array('label'=>"Numero Bic"));
  
 }
 
 echo $this->Form->end('Modifier');?>