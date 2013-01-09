 
 <?php $this->set('title_for_layout',"Editer mon profil");
 
 
 
 echo $this->Form->create('User',array('type'=>'file'));
 
 
 if ($SessionTypePers==1){

 echo $this->Form->input('Guide.sexe_guide', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Indiquez votre sexe :',//permet de choisir la legende
          'options' => array(0 => 'Femme', 1 => 'Homme')));
          
 echo $this->Form->error('Guide.sexe_guide');
 echo $this->Form->input('Vide',array('type'=>'label','label'=>""));
 echo $this->Uploader->iframe('Guide',$photoguide);}
 
 echo $this->Form->input('User.identifiant',array('label'=>"Votre Identifiant"));
 echo $this->Form->input('User.nom_user',array('label'=>"Nom"));
 echo $this->Form->input('User.prenom_user',array('label'=>"Prenom"));
 echo $this->Form->input('User.mail_user',array('label'=>"Votre email"));
 echo $this->Form->input('User.telephone_user',array('label'=>"Telephone"));
 echo $this->Form->input('User.date_naissance_user',array('label'=>"Date de naissance"));
 echo $this->Form->input('User.langue_id',array('label'=>'Choississez votre langue préférée :'));
 echo $this->Form->input('pass1',array('type'=>'password','label'=>"Votre nouveau mot de passe"));
 echo $this->Form->input('pass2',array('type'=>'password','label'=>"Confirmer le mot de passe"));

 


 echo $this->Form->end('Modifier');?>
 