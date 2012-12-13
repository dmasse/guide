<?php $this->set('title_for_layout',"Editer mon profil");

 echo $this->Form->create('User',array('type'=>'file'));
 
  if ($SessionTypePers==1){
  
   echo $this->Form->input('Guide.sexe_guide', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Indiquez votre sexe :',//permet de choisir la legende
          'options' => array(2 => 'Femme', 3 => 'Homme')));
          
 echo $this->Form->error('Guide.sexe_guide');
 echo $this->Form->input('Vide',array('type'=>'label','label'=>""));
 echo $this->Form->input('photo',array('type'=>'label','label'=>"Telecharger votre photo de profil :"));
 echo $this->Form->file('Guide.photo_guide');
  
  
  }
  
  
  
 
 
 
 
 echo $this->Form->input('identifiant',array('label'=>"Votre Identifiant"));
 echo $this->Form->input('nom_user',array('label'=>"Nom"));
 echo $this->Form->input('prenom_user',array('label'=>"Prenom"));
 echo $this->Form->input('mail_user',array('label'=>"Votre email"));
 echo $this->Form->input('telephone_user',array('label'=>"Telephone"));
 echo $this->Form->input('date_naissance_User',array('label'=>"Date de naissance"));
 echo $this->Form->input('pass1',array('type'=>'password','label'=>"Votre nouveau mot de passe"));
 echo $this->Form->input('pass2',array('type'=>'password','label'=>"Confirmer le mot de passe"));
 echo $this->Form->input('Langues.nom_langue',array('label'=>"Quel langues parlez vous ?"));
 if ($SessionTypePers==1){


 

 echo $this->Form->input('societe',array('type'=>'label','label'=>"Si vous faites parti d'une société remplissez les champs suivants :"));
 echo $this->Form->input('Societes.nom_societe',array('label'=>"Nom de la société"));
 echo $this->Form->input('Societes.telephone_societe',array('label'=>"Telephone de la société"));
 echo $this->Form->input('Societes.mail_societe',array('label'=>"Telephone de la société"));
 echo $this->Form->input('Societes.siret',array('label'=>"Numero de Siret de la société"));
 echo $this->Form->input('Diplome',array('type'=>'label','label'=>"vous avez la possibilité de telecharger la photo de votre diplome si vous disposez d'un :"));
 echo $this->Form->file('diplome.photo_diplome');
 echo $this->Form->input('Rib',array('type'=>'label','label'=>"Remplissez vous informations bancaires : "));
 echo $this->Form->input('rib_guide.banque',array('label'=>"Banque"));
 echo $this->Form->input('rib_guide.guichet',array('label'=>"Guichet"));
 echo $this->Form->input('rib_guide.num_compte',array('label'=>"Numéro de compte"));
 echo $this->Form->input('rib_guide.nom_titulaire',array('label'=>"Nom du titulaire"));
 echo $this->Form->input('rib_guide.domiciliation',array('label'=>"Adresse de la banque")); 
 echo $this->Form->input('rib_guide.num_iban',array('label'=>"Numero Iban"));
 echo $this->Form->input('rib_guide.bic',array('label'=>"Numero Bic"));
  
 }
 
 echo $this->Form->end('Modifier');?>